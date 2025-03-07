<?php

namespace App\Domains\Department\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface IDepartmentRepository {
    public function findDepartmentById(string $id) : object;
    public function updateDepartmentById(array $departmentData, string $id) : bool;
    public function createNewDepartment(array $departmentData) : Model;
    public function deleteDepartmentById(string $id) : bool;
    public function getAllDepartment() : LengthAwarePaginator;
}
