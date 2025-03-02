<?php

namespace App\Domains\Student\Interfaces;

use App\Domains\Student\Entities\Student;

interface StudentRepositoryInterface
{
    public function findById(string $id): ?Student;
    public function save(Student $student): void;
    public function update(Student $student): void;
    public function delete(string $id): void;
    public function findAll(): array;

}
