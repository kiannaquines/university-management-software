<?php

namespace App\Domains\Student\Interfaces;

use App\Domains\Student\Entities\Student;

interface StudentServiceInterface
{
    public function createStudent(array $data): Student;
    public function getStudentById(string $id): ?Student;
    public function updateStudent(string $id, array $data): void;
    public function deleteStudent(string $id): void;
}
