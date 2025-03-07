<?php

use App\Application\Http\Controllers\CollegeController;
use Illuminate\Support\Facades\Route;

Route::prefix('colleges')->group(function () {
    Route::resource('/', CollegeController::class)->parameter('', 'college_id')->names([
        'index'   => 'college.index',
        'create'  => 'college.create',
        'store'   => 'college.store',
        'show'    => 'college.show',
        'edit'    => 'college.edit',
        'update'  => 'college.update',
        'destroy' => 'college.destroy',
    ]);

    Route::get('/{college_id}/confirmation', [CollegeController::class, 'confirm'])
        ->name('college.confirm');
});
