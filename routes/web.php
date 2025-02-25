<?php

use app\Presentation\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students',[StudentController::class, 'index']);
