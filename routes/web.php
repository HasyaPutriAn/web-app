<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', [DashboardController::class, 'storefront']);
Route::get('/home', [DashboardController::class, 'storefront'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'home']);
Route::get('/gallery', [DashboardController::class, 'gallery']);
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