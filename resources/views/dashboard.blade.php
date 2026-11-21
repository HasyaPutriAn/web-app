<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $judul }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        @include('template.header')
        <div class="banner"></div>
        <div class="isi">
            @include('template.sidebar')
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
