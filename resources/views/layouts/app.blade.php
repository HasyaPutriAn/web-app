<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'web laravel Hasya')</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>{!! file_get_contents(resource_path('css/app.css')) !!}</style>
    @endif
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="{{ route('home') }}">
                <span class="brand-mark">O</span>
                <span>web laravel Hasya</span>
            </a>
            <nav class="main-nav" aria-label="Navigasi utama">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('product') }}">Produk</a>
                <a href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                <a href="{{ route('kalkulator.home') }}">Kalkulator</a>
                <a href="{{ route('kalkulator.segitiga') }}">Segitiga</a>
                <a href="{{ route('about') }}">Tentang</a>
            </nav>
        </div>
    </header>

    <main class="container page-content">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">web laravel Hasya <span>&middot;</span> Belanja dengan nyaman</div>
    </footer>
</body>
</html>
