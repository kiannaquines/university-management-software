<?php

namespace App\Domains\Department\Services;

use App\Domains\Department\Repositories\DepartmentRepository;
use Illuminate\Http\Request;
use Exception;

class DepartmentService {

    private DepartmentRepository $departmentRepository;
    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }
    /**
     * @throws Exception
     */
    public function getDepartmentById(string $id) : object {
        return $this->departmentRepository->findDepartmentById($id);
    }

    /**
     * @throws Exception
     */
    public function getDepartments() : array {
        return $this->departmentRepository->getAllDepartment();
    }

    /**
     * @throws Exception
     */
    public function createStudent(Request $request) : bool {
        return $this->departmentRepository->createNewDepartment([]);
    }

    /**
     * @throws Exception
     */
    public function updateStudent(array $departmentData, string $id) : bool {
        return $this->departmentRepository->update($departmentData, $id);
    }

    /**
     * @throws Exception
     */
    public function deleteDepartment(string $id) : bool {
        return $this->departmentRepository->deleteDepartmentById($id);
    }
}
