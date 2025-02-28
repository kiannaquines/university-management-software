<?php

use App\Application\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('courses')->name('courses')->group(function(){
    Route::get('/',[CourseController::class, 'index']);
    Route::get('/courses',[CourseController::class, 'create']);
    Route::get('/courses/{course_id}',[CourseController::class, 'show']);
});
