<?php

use App\Application\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('')->name('name')->group(function(){
    Route::get('/',[HomeController::class, 'index']);
});
