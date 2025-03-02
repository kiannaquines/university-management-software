<?php

namespace App\Domains\Student\Repositories;

use App\Domains\Student\Entities\Student;
use App\Domains\Student\Interfaces\StudentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class StudentRepository implements StudentRepositoryInterface
{
    public function findById(string $id): ?Student
    {
        $record = DB::table('student')->where('student_id', $id)->first();
        if (!$record) return null;

        return new Student(
            $record->firstname, $record->lastname, $record->middlename,
            $record->gender, $record->extension, $record->age,
            $record->address, $record->student_id
        );
    }

    public function findAll(): array
    {
        $records = DB::table('student')->get();

        return $records->map(function ($record) {
            return new Student(
                $record->firstname, $record->lastname, $record->middlename,
                $record->gender, $record->extension, $record->age,
                $record->address, $record->student_id
            );
        })->toArray();
    }

    public function save(Student $student): void
    {
        DB::table('student')->insert([
            'firstname' => $student->firstname,
            'lastname' => $student->lastname,
            'middlename' => $student->middlename,
            'gender' => $student->gender,
            'extension' => $student->extension,
            'age' => $student->age,
            'address' => $student->address,
            'student_id' => $student->student_id,
        ]);
    }

    public function getAllStudents(): Collection
    {
        return DB::table('student')->get();
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

