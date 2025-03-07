<?php

namespace App\Domains\Department\Repositories;

use App\Domains\Core\Repository\RepositoryBase;
use App\Domains\Department\Interfaces\IDepartmentRepository;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class DepartmentRepository extends RepositoryBase implements IDepartmentRepository {

    public function __construct()
    {
        parent::__construct('App\Infrastructure\Models\DepartmentModel');
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
     * @return Model
     * @throws Exception
     */
    public function createNewDepartment(array $departmentData): Model
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
     * @return LengthAwarePaginator
     * @throws Exception
     */
    public function getAllDepartment(): LengthAwarePaginator
    {
        return $this->all();
    }
}
