<?php

namespace App\Domains\Student\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface IStudentRepository
{
    public function findStudentById(string $id) : object;
    public function updateStudentById(array $studentData, string $id) : bool;
    public function createNewStudent(array $studentData) : Model;
    public function deleteStudentById(string $id) : bool;
    public function getAllStudent() : LengthAwarePaginator;
}
