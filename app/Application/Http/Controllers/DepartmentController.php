<?php

namespace App\Application\Http\Controllers;

use App\Domains\Department\Services\DepartmentService;
use Illuminate\Http\RedirectResponse;
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

    public function show() : View {
        return view('department.show');
    }

    public function create() : View {
        return view('department.create');
    }

    public function store() : RedirectResponse {
        return redirect()->route('department.index');
    }

    public function edit() : View {
        return view('department.edit');
    }

    public function update() : RedirectResponse {
        return redirect()->route('department.index');
    }

    public function confirm() : View {
        return view('department.confirm');
    }
    public function destroy() : RedirectResponse {
        return redirect()->route('department.index');
    }
}
