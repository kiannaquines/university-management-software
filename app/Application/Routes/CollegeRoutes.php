<?php

use App\Application\Http\Controllers\CollegeController;
use Illuminate\Support\Facades\Route;

Route::prefix('colleges')->group(function () {
    Route::resource('/', CollegeController::class)->parameter('', 'college_id')->names([
        'index'   => 'colleges.index',
        'create'  => 'colleges.create',
        'store'   => 'colleges.store',
        'show'    => 'colleges.show',
        'edit'    => 'colleges.edit',
        'update'  => 'colleges.update',
        'destroy' => 'colleges.destroy',
    ]);

    Route::get('/{college_id}/confirmation', [CollegeController::class, 'confirm'])
        ->name('colleges.confirm');
});
