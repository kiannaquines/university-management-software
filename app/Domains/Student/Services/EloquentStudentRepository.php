<?php

namespace App\Domains\Student\Services;

use App\Domains\Student\Entities\Student;
use App\Domains\Student\Interface\IEloquentStudentRepository;

class EloquentStudentRepository implements IEloquentStudentRepository {
    public function findById(string $id): ?Student
    {
        return $this->findById($id);
    }

    public function save(Student $student): void
    {
        $this->save($student);
    }
}
