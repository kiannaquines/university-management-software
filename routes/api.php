<?php
use App\Application\Http\Controllers\Api\ApiAuthController;
use App\Application\Http\Controllers\Api\ApiStudentController;
use App\Application\Http\Controllers\Api\ApiCollegeController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('register', [ApiAuthController::class, 'register']);
    Route::post('login', [ApiAuthController::class, 'login']);
    Route::middleware('auth:sanctum')->post('logout', [ApiAuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->prefix('students')->group(function () {
    Route::get('/', [ApiStudentController::class, 'index']);
    Route::post('/', [ApiStudentController::class, 'store']);
    Route::get('/{id}', [ApiStudentController::class, 'show']);
    Route::put('/{id}', [ApiStudentController::class, 'update']);
    Route::delete('/{id}', [ApiStudentController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->prefix('colleges')->group(function () {
    Route::get('/', [ApiCollegeController::class, 'index']);
    Route::post('/', [ApiCollegeController::class, 'store']);
    Route::get('/{id}', [ApiCollegeController::class, 'show']);
});



