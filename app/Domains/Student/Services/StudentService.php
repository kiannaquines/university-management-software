<?php

namespace App\Domains\Student\Services;


use App\Domains\Student\Entities\Student;
use App\Domains\Student\Interface\IStudentService;

class StudentService implements IStudentService {

    public function create(Student $student): void
    {
        // TODO: Implement create() method.
    }

    public function update(Student $student): void
    {
        // TODO: Implement update() method.
    }

    public function findById(string $id): ?Student
    {
        // TODO: Implement findById() method.
    }

    public function findByEmail(string $email): ?Student
    {
        // TODO: Implement findByEmail() method.
    }

    public function searchStudent(string $email): ?Student
    {
        // TODO: Implement searchStudent() method.
    }

    public function delete(int $id): void
    {
        // TODO: Implement delete() method.
    }
}
