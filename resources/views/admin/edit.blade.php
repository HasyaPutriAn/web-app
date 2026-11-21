@extends('layouts.app')

@section('title', 'Edit Admin')

@section('content')
    <section class="admin-form-card">
        <p class="eyebrow">Kelola akun</p>
        <h1>Edit Admin</h1>

        <form class="admin-form" action="{{ route('admin.update', $admin) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin._form', ['admin' => $admin])
            <button class="button" type="submit">Simpan Perubahan</button>
        </form>
    </section>
@endsection
