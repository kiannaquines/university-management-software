<?php

namespace App\Domains\Instructor\Interfaces;

interface IInstructor
{
    public function findInstructorById(string $id) : object;
    public function updateInstructorById(array $instructorData, string $id) : bool;
    public function createNewInstructor(array $instructorData) : bool;
    public function deleteInstructorById(string $id) : bool;
    public function getAllInstructor() : array;
}
