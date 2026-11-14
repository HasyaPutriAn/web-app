<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/home', [DashboardController::class, 'home']);
Route::get('/product', [DashboardController::class, 'product']);
Route::get('/produk/detail/{harga}', [DashboardController::class, 'detail']);
Route::get('/about', [DashboardController::class, 'about']);