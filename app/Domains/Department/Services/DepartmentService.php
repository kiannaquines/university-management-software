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
     * @param Request $request
     * @return bool
     * @throws Exception
     */
    public function createDepartment(Request $request) : bool {
        $validated = $request->validate([
           'department' => 'required|string|max:255',
           'department_description' => 'required|string|max:255',
           'college_id' => 'required|string|max:255'
        ]);
        return $this->departmentRepository->createNewDepartment($validated);
    }

    /**
     * @throws Exception
     */
    public function updateDepartment(Request $request, string $id) : bool {
        $validated = $request->validate([
           'department' => 'required|string|max:255',
           'department_description' => 'required|string|max:255',
           'college_id' => 'required|string|max:255'
        ]);
        return $this->departmentRepository->update($validated, $id);
    }

    /**
     * @throws Exception
     */
    public function deleteDepartment(string $id) : bool {
        return $this->departmentRepository->deleteDepartmentById($id);
    }
}
