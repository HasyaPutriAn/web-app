@extends('layouts.app')

@section('title', 'Web | ')

@section('content')
    <section class="about-card">
        <p class="eyebrow">web laravel Hasya</p>
        <h1>Selamat datang.</h1>
        <p>Temukan produk pilihan kami dan lihat detail harganya.</p>
        <a class="text-link" href="{{ route('product') }}">Lihat produk <span aria-hidden="true">&rarr;</span></a>
    </section>
@endsection
