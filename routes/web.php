<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.authenticate');

Route::middleware('islogin')->group(function () {
    Route::get('/home', [DashboardController::class, 'storefront'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');
    Route::get('/gallery', [DashboardController::class, 'gallery'])->name('gallery');

    Route::get('/employe', [EmployeController::class, 'index'])->name('employe.index');
    Route::get('/employe/create', [EmployeController::class, 'create'])->name('employe.create');
    Route::post('/employe/store', [EmployeController::class, 'store'])->name('employe.store');
    Route::get('/employe/edit/{employe}', [EmployeController::class, 'show'])->name('employe.edit');
    Route::put('/employe/{employe}', [EmployeController::class, 'update'])->name('employe.update');
    Route::delete('/employe/{employe}', [EmployeController::class, 'destroy'])->name('employe.destroy');

    Route::resource('admin', \App\Http\Controllers\AdminController::class);
    Route::get('/product', [DashboardController::class, 'product'])->name('product');
    Route::get('/produk/detail/{harga}', [DashboardController::class, 'detail'])
        ->whereNumber('harga')
        ->name('produk.detail');
    Route::get('/about', [DashboardController::class, 'about'])->name('about');

    Route::get('/daftar/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');

    Route::get('/kalkulator', [KalkulatorController::class, 'home'])->name('kalkulator.home');
    Route::post('/kalkulator/proses', [KalkulatorController::class, 'proses'])->name('kalkulator.proses');
    Route::get('/kalkulator/segitiga', [KalkulatorController::class, 'segitiga'])
        ->name('kalkulator.segitiga');
    Route::post('/kalkulator/segitiga', [KalkulatorController::class, 'segitiga'])
        ->name('kalkulator.segitiga.proses');

    Route::get('/web', [App\Http\Controllers\Web::class, 'home']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});