<?php

use App\Presentation\Http\Controllers\InstructorController;
use Illuminate\Support\Facades\Route;

Route::prefix('instructors')->name('instructors')->group(function(){
    Route::get('/',[InstructorController::class, 'index']);
    Route::get('/instructors',[InstructorController::class, 'create']);
    Route::get('/instructors/{instructor_id}',[InstructorController::class, 'show']);
});
