<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\VendorController;


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

    Route::prefix('vendors')
        ->controller(VendorController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.vendors.index');
            Route::post('/tambah', 'store')->name('admin.vendors.store');
            Route::put('/{vendor}/update', 'update')->name('admin.vendors.update');
            Route::delete('/{vendor}/hapus', 'destroy')->name('admin.vendors.destroy');
    });
});

