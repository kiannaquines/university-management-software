<?php

namespace App\Domains\Student\Repositories;

use App\Domains\Student\Entities\Student;
use App\Domains\Student\Interface\IStudentRepository;

class StudentRepository implements IStudentRepository {
    public function findById(string $id): ?Student
    {
        return $this->findById($id);
    }

    public function save(Student $student): void
    {
        $this->save($student);
    }
}
