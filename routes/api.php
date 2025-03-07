<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Application\Http\Controllers\Api\ApiStudentController;

Route::get('/students', [ApiStudentController::class, 'index']);
Route::post('/students', [ApiStudentController::class, 'store']);
Route::get('/students/{id}', [ApiStudentController::class, 'show']);
Route::put('/students/{id}', [ApiStudentController::class, 'update']);
Route::delete('/students/{id}', [ApiStudentController::class, 'destroy']);



