<?php

use App\Application\Http\Controllers\GradesController;
use Illuminate\Support\Facades\Route;

Route::prefix('grades')->name('grades')->group(function(){
    Route::get('/',[GradesController::class, 'index']);
    Route::get('/grades',[GradesController::class, 'create']);
    Route::get('/grades/{grade_id}',[GradesController::class, 'show']);
});
