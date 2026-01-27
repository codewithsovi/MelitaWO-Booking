<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\DaftarKlienController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\FAQController;


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

    Route::prefix('clients')
        ->controller(DaftarKlienController::class)
        ->group(function () {
            Route::get('/paket', 'paket')->name('admin.clients.paket');
            Route::get('/{paket_id}/daftar', 'index')->name('admin.clients.daftar');
    });

    Route::prefix('Gallery')
        ->controller(GalleryController::class)
        ->group(function(){
            Route::get('/', 'index')->name('admin.galleries.index');
    });


    Route::prefix('contents')
        ->controller(ContentController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.contents.index');
            Route::post('/tambah', 'store')->name('admin.contents.store');
            Route::put('/{id}/update', 'update')->name('admin.contents.update');
            Route::delete('/{id}/hapus', 'destroy')->name('admin.contents.destroy');
    });

    Route::prefix('FAQ')
        ->controller(FAQController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.faqs.index');
            Route::post('/tambah', 'store')->name('admin.faqs.store');
            Route::put('/{fAQ}/update', 'update')->name('admin.faqs.update');
            Route::delete('/{fAQ}/hapus', 'destroy')->name('admin.faqs.destroy');
    });
});

