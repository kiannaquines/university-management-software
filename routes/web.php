<?php

use App\Application\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/Profile', [ProfileController::class, 'edit'])->name('Profile.edit');
    Route::patch('/Profile', [ProfileController::class, 'update'])->name('Profile.update');
    Route::delete('/Profile', [ProfileController::class, 'destroy'])->name('Profile.destroy');
});

Route::middleware('web')->group(function () {
    require base_path('app/Application/Routes/StudentRoutes.php');
    require base_path('app/Application/Routes/CollegeRoutes.php');
    require base_path('app/Application/Routes/HomeRoutes.php');
});

require __DIR__.'/auth.php';
