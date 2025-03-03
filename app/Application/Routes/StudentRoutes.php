<?php

use App\Application\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('students')->group(function () {
    Route::resource('/', StudentController::class)->parameter('', 'student_id')->names([
        'index'   => 'students.index',
        'create'  => 'students.create',
        'store'   => 'students.store',
        'show'    => 'students.show',
        'edit'    => 'students.edit',
        'update'  => 'students.update',
        'destroy' => 'students.destroy',
    ]);

    Route::get('/{student_id}/confirmation', [StudentController::class, 'confirm'])
        ->name('students.confirm');
});
