@extends('layouts.app')

@section('title', 'Produk | web laravel Hasya')

@section('content')
    <section class="page-intro">
        <p class="eyebrow">Temukan favoritmu</p>
        <h1>Produk</h1>
        <p>Barang pilihan dengan harga yang jelas. Klik produk untuk melihat detailnya.</p>
    </section>

    <div class="product-grid product-grid-wide">
        @foreach ($products as $product)
            <article class="product-card">
                <a class="product-visual visual-{{ $loop->iteration }}" href="{{ route('produk.detail', $product['price']) }}" aria-label="Lihat {{ $product['name'] }}">
                    <span class="visual-shape"></span>
                    <span class="product-number">0{{ $loop->iteration }}</span>
                </a>
                <div class="product-info">
                    <div>
                        <h2>{{ $product['name'] }}</h2>
                        <p>{{ $product['description'] }}</p>
                    </div>
                    <a class="price-link" href="{{ route('produk.detail', $product['price']) }}">
                        Rp {{ number_format($product['price'], 0, ',', '.') }}
                    </a>
                </div>
            </article>
        @endforeach
    </div>
@endsection
