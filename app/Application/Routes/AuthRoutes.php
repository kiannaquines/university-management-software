<?php

namespace App\Application\Routes;

use Illuminate\Support\Facades\Route;
use App\Application\Http\Controllers\AuthController;

Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

