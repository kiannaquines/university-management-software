<?php

use App\Application\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/store', [StudentController::class, 'store'])->name('students.store');
    Route::get('/{student_id}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/{student_id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/{student_id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/{student_id}', [StudentController::class, 'destroy'])->name('students.destroy');
});
