<?php

namespace App\Application\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DepartmentController extends Controller {
    public function index() : View {
        $departments = [];
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
