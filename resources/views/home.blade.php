@extends('layouts.app')

@section('title', 'Home | web laravel Hasya')

@section('content')
    <section class="hero">
        <div class="hero-copy">
            <p class="eyebrow">Pilihan untuk hari ini</p>
            <h1>Selamat Datang di web laravel Hasya</h1>
            <p>Temukan barang pilihan untuk menemani kegiatanmu sehari-hari.</p>
            <a class="button button-light" href="{{ route('product') }}">Lihat produk <span aria-hidden="true">&rarr;</span></a>
        </div>
        <div class="hero-art" aria-hidden="true">
            <span class="art-circle"></span>
            <span class="art-card art-card-back"></span>
            <span class="art-card art-card-front">Pilihan<br>minggu ini</span>
            <span class="art-sparkle">✳</span>
        </div>
    </section>

    <section class="section-block">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Dikurasi untukmu</p>
                <h2>Produk pilihan</h2>
            </div>
            <a class="text-link" href="{{ route('product') }}">Lihat semua <span aria-hidden="true">&rarr;</span></a>
        </div>
        <div class="product-grid">
            @foreach ($products as $product)
                <article class="product-card">
                    <a class="product-visual visual-{{ $loop->iteration }}" href="{{ route('produk.detail', $product['price']) }}" aria-label="Lihat {{ $product['name'] }}">
                        <span class="visual-shape"></span>
                        <span class="product-number">0{{ $loop->iteration }}</span>
                    </a>
                    <div class="product-info">
                        <div>
                            <h3>{{ $product['name'] }}</h3>
                            <p>{{ $product['description'] }}</p>
                        </div>
                        <strong>Rp {{ number_format($product['price'], 0, ',', '.') }}</strong>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
