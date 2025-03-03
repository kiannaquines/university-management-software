<?php

namespace App\Domains\Student\Repositories;

use App\Domains\Student\Entities\Student;
use App\Domains\Student\Interfaces\StudentRepositoryInterface;
use Illuminate\Support\Facades\DB;

class StudentRepository implements StudentRepositoryInterface
{
    public function findById(string $id): ?Student
    {
        $record = DB::table('student')->where('student_id', $id)->first();

        if (!$record) return null;

        return new Student(
            $record->firstname,
            $record->lastname,
            $record->gender,
            $record->age,
            $record->address,
            $record->student_id,
            $record->middlename,
            $record->extension,
            $record->id,
            $record->created_at,
            $record->updated_at,
        );
    }

    public function findAll(): array
    {
        $records = DB::table('student')
            ->select('firstname', 'lastname', 'middlename', 'gender', 'extension', 'age', 'address', 'student_id','created_at')
            ->orderBy('lastname')
            ->get();

        return $records->map(fn($record) => new Student(
            $record->firstname,
            $record->lastname,
            $record->gender,
            $record->age,
            $record->address,
            $record->student_id,
            $record->middlename,
            $record->extension,
            $record->created_at,
        ))->toArray();
    }

    public function save(Student $student): void
    {
        DB::table('student')->insert([
            'firstname' => $student->firstname,
            'lastname' => $student->lastname,
            'gender' => $student->gender,
            'middlename' => $student->middlename,
            'extension' => $student->extension,
            'age' => $student->age,
            'address' => $student->address,
            'student_id' => $student->student_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function update(Student $student): void
    {
        DB::table('student')->where('student_id', $student->student_id)->update([
            'firstname' => $student->firstname,
            'lastname' => $student->lastname,
            'middlename' => $student->middlename,
            'gender' => $student->gender,
            'extension' => $student->extension,
            'age' => $student->age,
            'address' => $student->address,
        ]);
    }

    public function delete(string $id): void
    {
        DB::table('student')->where('student_id', $id)->delete();
    }
}

