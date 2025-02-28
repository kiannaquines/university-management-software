<?php

use App\Application\Http\Controllers\CollegeController;
use Illuminate\Support\Facades\Route;

Route::prefix('colleges')->name('colleges')->group(function(){
    Route::get('/',[CollegeController::class, 'index']);
    Route::get('/colleges',[CollegeController::class, 'create']);
    Route::get('/colleges/{college_id}',[CollegeController::class, 'show']);
});
