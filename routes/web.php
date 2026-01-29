<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\DaftarKlienController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\KelolaKontenController;
use App\Http\Controllers\SesiController;

Route::get('/', function () {
    return view('Client.landing-page');
})->name('landing-page');

// client

Route::middleware(['sudahLogin'])->group(function () {
    Route::get('/login', [SesiController::class, 'toLogin'])->name('login');
    Route::post('/proses-login', [SesiController::class, 'prosesLogin'])->name('proses.login');
});

Route::prefix('admin')->middleware(['isLogin', 'userAkses:admin'])->group(function () {
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

    Route::prefix('kelola-konten')
        ->controller(KelolaKontenController::class)
        ->group(function () {
            Route::get('/', 'index')->name('admin.kelola-konten.index');
            Route::put('/gallery/{gallery}/update-foto', 'update_foto')->name('admin.galleries.update_foto');
            Route::put('/content/{content}/update-konten', 'update_konten')->name('admin.contents.update_konten');
            Route::post('/tambah', 'store_faq')->name('admin.faqs.store');
            Route::put('/{fAQ}/update', 'update_faq')->name('admin.faqs.update');
            Route::delete('/{fAQ}/hapus', 'destroy_faq')->name('admin.faqs.destroy');
    });

    Route::post('/logout', [SesiController::class, 'logout'])->name('logout');

});
     

