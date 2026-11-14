@extends('layouts.app')

@section('title', $product['name'] . ' | web laravel Hasya')

@section('content')
    <p class="breadcrumb"><a href="{{ route('product') }}">Produk</a><span>/</span>{{ $product['name'] }}</p>
    <section class="detail-card">
        <div class="product-visual detail-visual visual-{{ $product['visual'] }}">
            <span class="visual-shape"></span>
        </div>
        <div class="detail-copy">
            <p class="eyebrow">Pilihan web laravel Hasya</p>
            <h1>{{ $product['name'] }}</h1>
            <p>{{ $product['description'] }}</p>
            <p class="detail-price">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
            <a class="button" href="{{ route('product') }}">Kembali ke produk</a>
        </div>
    </section>
@endsection
