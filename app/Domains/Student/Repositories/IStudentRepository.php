<?php

namespace App\Domains\Student\Repositories;

use App\Domains\Core\Repository\IRepositoryBase;
use App\Domains\Student\Entities\Student;
use Illuminate\Support\Facades\DB;

class IStudentRepository implements IRepositoryBase
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
            ->select(
                'firstname',
                'lastname',
                'middlename',
                'gender',
                'extension',
                'age',
                'address',
                'student_id',
                'created_at'
            )
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

    public function save(object $entity): void
    {
        DB::table('student')->insert([
            'firstname' => $entity->firstname,
            'lastname' => $entity->lastname,
            'gender' => $entity->gender,
            'middlename' => $entity->middlename,
            'extension' => $entity->extension,
            'age' => $entity->age,
            'address' => $entity->address,
            'student_id' => $entity->student_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function update(object $entity): void
    {
        DB::table('student')->where('student_id', $entity->student_id)->update([
            'firstname' => $entity->firstname,
            'lastname' => $entity->lastname,
            'middlename' => $entity->middlename,
            'gender' => $entity->gender,
            'extension' => $entity->extension,
            'age' => $entity->age,
            'address' => $entity->address,
            'updated_at' => now(),
        ]);
    }

    public function delete($id): void
    {
        DB::table('student')->where('student_id', $id)->delete();
    }
}

