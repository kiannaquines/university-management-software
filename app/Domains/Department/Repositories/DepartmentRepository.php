<?php

namespace App\Domains\Department\Repositories;

use App\Domains\Core\Repository\RepositoryBase;
use App\Domains\Department\Interfaces\IDepartmentRepository;
use Exception;

class DepartmentRepository extends RepositoryBase implements IDepartmentRepository {

    public function __construct()
    {
        parent::__construct('departments', 'App\Domains\Department\Entities\Department');
    }

    /**
     * @param string $id
     * @return object
     * @throws Exception
     */
    public function findDepartmentById(string $id): object
    {
        return $this->find($id);
    }

    /**
     * @param array $departmentData
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function updateDepartmentById(array $departmentData, string $id): bool
    {
        return $this->update($departmentData, $id);
    }

    /**
     * @param array $departmentData
     * @return bool
     * @throws Exception
     */
    public function createNewDepartment(array $departmentData): bool
    {
        return $this->create($departmentData);
    }

    /**
     * @param string $id
     * @return bool
     * @throws Exception
     */
    public function deleteDepartmentById(string $id): bool
    {
        return $this->delete($id);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function getAllDepartment(): array
    {
        return $this->all();
    }
}
