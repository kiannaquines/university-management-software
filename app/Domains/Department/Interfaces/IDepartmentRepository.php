<?php

namespace App\Domains\Department\Interfaces;

interface IDepartmentRepository {
    public function findDepartmentById(string $id) : object;
    public function updateDepartmentById(array $departmentData, string $id) : bool;
    public function createNewDepartment(array $departmentData) : bool;
    public function deleteDepartmentById(string $id) : bool;
    public function getAllDepartment() : array;
}
