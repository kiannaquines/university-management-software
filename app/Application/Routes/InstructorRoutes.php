<?php

use App\Application\Http\Controllers\InstructorController;

use Illuminate\Support\Facades\Route;

Route::prefix('instructors')->group(function(){
    Route::resource('/', InstructorController::class)->parameter('', 'instructor_id')->names([
        'index'   => 'instructor.index',
        'create'  => 'instructor.create',
        'store'   => 'instructor.store',
        'show'    => 'instructor.show',
        'edit'    => 'instructor.edit',
        'update'  => 'instructor.update',
        'destroy' => 'instructor.destroy',
    ]);

    Route::get('/{instructor_id}/confirmation', [InstructorController::class, 'confirm'])
        ->name('instructor.confirm');
});
