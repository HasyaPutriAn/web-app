@extends('layouts.app')

@section('title', 'Tambah Admin')

@section('content')
    <section class="admin-form-card">
        <p class="eyebrow">Kelola akun</p>
        <h1>Tambah Admin</h1>

        <form class="admin-form" action="{{ route('admin.store') }}" method="POST">
            @csrf
            @include('admin._form')
            <button class="button" type="submit">Simpan Admin</button>
        </form>
    </section>
@endsection
