<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home.index');
});

Route::middleware('web')->group(function () {
    require base_path('app/Application/Routes/StudentRoutes.php');
    require base_path('app/Application/Routes/CollegeRoutes.php');
    require base_path('app/Application/Routes/HomeRoutes.php');
});
