<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    require base_path('app/Presentation/Routes/Students/Routes.php');
    require base_path('app/Presentation/Routes/Courses/Routes.php');
    require base_path('app/Presentation/Routes/Departments/Routes.php');
    require base_path('app/Presentation/Routes/Grades/Routes.php');
    require base_path('app/Presentation/Routes/Instructors/Routes.php');
    require base_path('app/Presentation/Routes/Semesters/Routes.php');
    require base_path('app/Presentation/Routes/Years/Routes.php');
});
