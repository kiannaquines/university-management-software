<?php

namespace App\Domains\Department\Services;

use App\Domains\Core\Service\ServiceBase;
use App\Domains\Department\Data\DepartmentData;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Exception;

class DepartmentService extends ServiceBase
{

    public function __construct()
    {
        parent::__construct('App\Domains\Department\Entities\DepartmentModel');
    }
    /**
     * @throws Exception
     */
    public function getDepartmentById(string $id): Model
    {
        return $this->find($id);
    }

    /**
     * @return LengthAwarePaginator
     * @throws Exception
     */
    public function getDepartments(): LengthAwarePaginator
    {
        return $this->all();
    }

    /**
     * @param Request $request
     * @return Model
     * @throws Exception
     */
    public function createDepartment(Request $request): Model
    {
        $departmentData = DepartmentData::from($request->all());
        return $this->create($departmentData->toArray());
    }

    /**
     * @throws Exception
     */
    public function updateDepartment(Request $request, string $id): bool
    {
        $departmentData = DepartmentData::from($request->all());
        return $this->update($departmentData->toArray(), $id);
    }

    /**
     * @throws Exception
     */
    public function deleteDepartment(string $id): bool
    {
        return $this->delete($id);
    }
}
