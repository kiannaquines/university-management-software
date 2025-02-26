<?php

use App\Presentation\Http\Controllers\YearController;
use Illuminate\Support\Facades\Route;

Route::prefix('years')->name('years')->group(function(){
    Route::get('/',[YearController::class, 'index']);
    Route::get('/years',[YearController::class, 'create']);
    Route::get('/years/{student_id}',[YearController::class, 'show']);
});
