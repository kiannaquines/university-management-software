<?php

namespace App\Domains\Student\Interface;

use App\Domains\Student\Entities\Student;

interface IEloquentStudentRepository
{
    public function findById(string $id): ?Student;
    public function save(Student $student): void;
}
