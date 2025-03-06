<?php

use Illuminate\Support\Facades\Route;
use App\Application\Http\Controllers\DepartmentController;

Route::prefix('departments')->group(function(){
    Route::resource('/', DepartmentController::class)->parameter('', 'department_id')->names([
        'index'   => 'department.index',
        'create'  => 'department.create',
        'store'   => 'department.store',
        'show'    => 'department.show',
        'edit'    => 'department.edit',
        'update'  => 'department.update',
        'destroy' => 'department.destroy',
    ]);
});
