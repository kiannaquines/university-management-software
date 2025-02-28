<?php

use App\Application\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('students')->group(function(){
    Route::get('/',[StudentController::class, 'index']);
    Route::get('/create',[StudentController::class, 'create']);
    Route::get('/show/{student_id}',[StudentController::class, 'show']);
});
