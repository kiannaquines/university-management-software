<?php

use App\Presentation\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('students')->name('students')->group(function(){
    Route::get('/',[StudentController::class, 'index']);
    Route::get('/students',[StudentController::class, 'create']);
    Route::get('/students/{student_id}',[StudentController::class, 'show']);
});
