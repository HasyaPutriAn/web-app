<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    private const PRODUCTS = [
        ['name' => 'Sepatu', 'price' => 300000, 'description' => 'Nyaman dipakai dari pagi sampai sore.', 'visual' => 1],
        ['name' => 'Baju', 'price' => 200000, 'description' => 'Pilihan simpel untuk menemani aktivitas harian.', 'visual' => 2],
        ['name' => 'Celana', 'price' => 150000, 'description' => 'Potongan santai yang mudah dipadukan.', 'visual' => 3],
    ];

    public function home()
    {
        return view('home', ['judul' => 'Laman Home']);
    }

    public function storefront()
    {
        return view('storefront', ['products' => self::PRODUCTS]);
    }

    public function gallery()
    {
        return view('gallery', ['judul' => 'Laman Gallery']);
    }

    public function product()
    {
        return view('products.index', ['products' => self::PRODUCTS]);
    }

    public function detail(int $harga)
    {
        $product = collect(self::PRODUCTS)->firstWhere('price', $harga);

        abort_if($product === null, 404);

        return view('products.show', ['product' => $product]);
    }

    public function about()
    {
        return view('about');
    }
}