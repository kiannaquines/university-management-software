<?php

use App\Application\Http\Controllers\InstructorController;
use Illuminate\Support\Facades\Route;

Route::prefix('instructors')->name('instructors')->group(function(){
    Route::get('/',[InstructorController::class, 'index']);
    Route::get('/create',[InstructorController::class, 'create']);
    Route::get('/show/{instructor_id}',[InstructorController::class, 'show']);
});
