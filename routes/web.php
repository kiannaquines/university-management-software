<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return 'Home Page';
});

Route::middleware('web')->group(function () {
    require base_path('app/Application/Routes/CollegeRoutes.php');
    require base_path('app/Application/Routes/InstructorRoutes.php');
    require base_path('app/Application/Routes/SemesterRoutes.php');
    require base_path('app/Application/Routes/StudentRoutes.php');
    require base_path('app/Application/Routes/GradeRoutes.php');
    require base_path('app/Application/Routes/DepartmentRoutes.php');
    require base_path('app/Application/Routes/CourseRoutes.php');
    require base_path('app/Application/Routes/YearRoutes.php');
});
