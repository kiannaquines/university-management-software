<?php

namespace App\Domains\Student\Repositories;

use App\Domains\Student\Entities\Student;
use App\Domains\Student\Interface\IEloquentStudentRepository;

class EloquentEloquentStudentRepository implements IEloquentStudentRepository {
    public function findById(string $id): ?Student
    {
        return $this->findById($id);
    }

    public function save(Student $student): void
    {
        $this->save($student);
    }
}
