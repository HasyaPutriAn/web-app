<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home() {
        return "<h1>Selamat Datang di Olshop Kami</h1>";
    }

    public function product() {
        return "
        <h2>Product</h2>
        <ul>
            <li><a href='/produk/detail/300000'>Sepatu</a></li>
            <li><a href='/produk/detail/200000'>Baju</a></li>
            <li><a href='/produk/detail/150000'>Celana</a></li>
        </ul>";
    }

    public function detail($harga) {
        return "<h2>Detail Produk</h2><p>Harga: Rp ".number_format($harga, 0, ',', '.')."</p>";
    }

    public function about() {
        return "<h2>About</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>";
    }
}