<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::prefix('admin')
    ->controller(DashboardController::class)
    ->group(function () {
        Route::get('/dashboard', 'index')->name('admin.dashboard');
    }
);
