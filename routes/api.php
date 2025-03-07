<?php

use Illuminate\Support\Facades\Route;
use App\Application\Http\Controllers\Api\ApiStudentController;

Route::prefix('students')->group(function () {
    Route::get('/', [ApiStudentController::class, 'index']);
    Route::post('/', [ApiStudentController::class, 'store']);
    Route::get('/{id}', [ApiStudentController::class, 'show']);
    Route::put('/{id}', [ApiStudentController::class, 'update']);
    Route::delete('/{id}', [ApiStudentController::class, 'destroy']);
})->middleware('auth:sanctum');




