<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController;


Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('paket')
        ->controller(PackageController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.packages.index');
            Route::post('/tambah', 'store')->name('admin.packages.store');
            Route::put('/{package}/update', 'update')->name('admin.packages.update');
            Route::delete('/{package}/hapus', 'destroy')->name('admin.packages.destroy');
    });
});

