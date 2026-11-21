@extends('layouts.app')

@section('title', 'Detail Admin')

@section('content')
    <section class="admin-form-card">
        <p class="eyebrow">Kelola akun</p>
        <h1>Detail Admin</h1>

        <dl class="admin-details">
            <dt>ID Admin</dt>
            <dd>{{ $admin->id_admin }}</dd>
            <dt>Username</dt>
            <dd>{{ $admin->username }}</dd>
        </dl>

        <a class="button" href="{{ route('admin.edit', $admin) }}">Edit Admin</a>
        <a class="text-link admin-back" href="{{ route('admin.index') }}">Kembali ke daftar</a>
    </section>
@endsection
