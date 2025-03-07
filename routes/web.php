<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','verified'])->group(function () {
    require base_path('app/Application/Routes/HomeRoutes.php');
    require base_path('app/Application/Routes/CollegeRoutes.php');
    require base_path('app/Application/Routes/StudentRoutes.php');
    require base_path('app/Application/Routes/ProfileRoutes.php');
    require base_path('app/Application/Routes/InstructorRoutes.php');
    require base_path('app/Application/Routes/DepartmentRoutes.php');
});

require base_path('app/Application/Routes/AuthRoutes.php');



