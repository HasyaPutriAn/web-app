@extends('layouts.app')

@section('title', 'Tentang | web laravel Hasya')

@section('content')
    <section class="about-card">
        <p class="eyebrow">Tentang kami</p>
        <h1>Belanja simpel, pilihan tetap nyaman.</h1>
        <p>web laravel Hasya menghadirkan pilihan sepatu, baju, dan celana untuk kebutuhan sehari-hari. Kami ingin pengalaman belanjamu terasa mudah, mulai dari memilih produk sampai melihat harganya.</p>
        <a class="text-link" href="{{ route('product') }}">Jelajahi produk <span aria-hidden="true">&rarr;</span></a>
    </section>
@endsection
