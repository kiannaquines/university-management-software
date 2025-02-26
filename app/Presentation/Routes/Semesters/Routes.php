<?php

use App\Presentation\Http\Controllers\SemesterController;
use Illuminate\Support\Facades\Route;

Route::prefix('semester')->name('semester')->group(function(){
    Route::get('/',[SemesterController::class, 'index']);
    Route::get('/semester',[SemesterController::class, 'create']);
    Route::get('/semester/{semester_id}',[SemesterController::class, 'show']);
});
