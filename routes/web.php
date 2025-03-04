<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    require base_path('app/Application/Routes/HomeRoutes.php');
    require base_path('app/Application/Routes/AuthRoutes.php');
    require base_path('app/Application/Routes/CollegeRoutes.php');
    require base_path('app/Application/Routes/StudentRoutes.php');
});
