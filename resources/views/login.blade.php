@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <section class="login-card">
        <p class="eyebrow">Area anggota</p>
        <h1>Login Users</h1>
        <p class="login-description">Masuk dengan email dan password akun Anda untuk melanjutkan.</p>

        @if ($errors->any())
            <div class="login-error" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form class="login-form" action="{{ route('login.authenticate') }}" method="POST">
            @csrf

            <label for="email">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required autofocus>

            <label for="password">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required>

            <button class="button" type="submit">Login</button>
        </form>
    </section>
@endsection
