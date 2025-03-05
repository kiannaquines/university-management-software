<?php

namespace App\Domains\Student\Interfaces;

interface IStudentRepository
{
    public function findStudentById(string $id) : object;
    public function updateStudentById(array $studentData, string $id) : bool;
    public function createNewStudent(array $studentData) : bool;
    public function deleteStudentById(string $id) : bool;
    public function getAllStudent() : array;
}
