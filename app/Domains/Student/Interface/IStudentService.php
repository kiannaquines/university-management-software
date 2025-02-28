<?php

namespace App\Domains\Student\Interface;

use App\Domains\Student\Entities\Student;

interface IStudentService
{
    public function create(Student $student): void;

    public function update(Student $student): void;

    public function findById(string $id): ?Student;

    public function findByEmail(string $email): ?Student;

    public function searchStudent(String $email): ?Student;

    public function delete(int $id): void;
}
