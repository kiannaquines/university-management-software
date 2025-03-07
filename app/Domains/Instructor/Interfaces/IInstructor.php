<?php

namespace App\Domains\Instructor\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface IInstructor
{
    public function findInstructorById(string $id) : object;
    public function updateInstructorById(array $instructorData, string $id) : bool;
    public function createNewInstructor(array $instructorData) : Model;
    public function deleteInstructorById(string $id) : bool;
    public function getAllInstructor() : LengthAwarePaginator;
}
