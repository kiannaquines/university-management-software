<?php

namespace App\Application\Http\Controllers;

use App\Domains\Department\Forms\CreateDepartmentForm;
use App\Domains\Department\Forms\UpdateDepartmentForm;
use App\Domains\Department\Services\DepartmentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Exception;

class DepartmentController extends Controller {

    private DepartmentService  $departmentService;

    public function __construct(DepartmentService $departmentService) {
        $this->departmentService = $departmentService;
    }

    /**
     * @return View
     * @throws Exception
     */
    public function index() : View {
        $departments = $this->departmentService->getDepartments();
        return view('department.index',compact('departments'));
    }

    /**
     * @param string $id
     * @return View
     * @throws Exception
     */
    public function show(string $id) : View {
        $department = $this->departmentService->getDepartmentById($id);
        return view('department.show',compact('department'));
    }

    public function create() : View {
        $errors = session('errors') ? session('errors')->getBag('default')->getMessages() : [];
        $departmentForm = new CreateDepartmentForm(route('department.store'), 'POST', $errors, old())->render();
        return view('department.create',compact('departmentForm'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(Request $request) : RedirectResponse {
        $result = $this->departmentService->createDepartment($request);

        if ($result) {
            return redirect()->route('department.index')->with('success', 'Department created successfully.');
        }
        return redirect()->route('department.index')->with('error', 'Department could not be created.');
    }

    /**
     * @param string $id
     * @return View
     * @throws Exception
     */
    public function edit(string $id) : View {
        $errors = session('errors') ? session('errors')->getBag('default')->getMessages() : [];
        $department = $this->departmentService->getDepartmentById($id);
        $departmentForm = new UpdateDepartmentForm(
            route('department.update', $department->id),
            'PUT',
            $errors,
            (array) $department)->render();
        return view('department.edit',compact('departmentForm'));
    }

    /**
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function update(Request $request, string $id) : RedirectResponse {
        $result = $this->departmentService->updateDepartment($request, $id);

        if ($result) {
            return redirect()->route('department.index')->with('success', 'Department updated successfully.');
        }
        return redirect()->route('department.index')->with('error', 'Department could not be updated.');
    }

    /**
     * @param string $id
     * @return View
     * @throws Exception
     */
    public function confirm(string $id) : View {
        $department = $this->departmentService->getDepartmentById($id);
        return view('department.confirm',compact('department'));
    }

    /**
     * @param string $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(string $id) : RedirectResponse {
        $result = $this->departmentService->deleteDepartment($id);

        if ($result) {
            return redirect()->route('department.index')->with('success', 'Department deleted successfully.');
        }

        return redirect()->route('department.index')->with('error', 'Department could not be deleted.');
    }
}
