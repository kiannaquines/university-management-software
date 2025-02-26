<?php

use App\Presentation\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::prefix('departments')->name('departments')->group(function(){
    Route::get('/',[DepartmentController::class, 'index']);
    Route::get('/departments',[DepartmentController::class, 'create']);
    Route::get('/departments/{department_id}',[DepartmentController::class, 'show']);
});
