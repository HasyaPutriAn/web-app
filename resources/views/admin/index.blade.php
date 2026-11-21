@extends('layouts.app')

@section('title', 'Data Admin')

@section('content')
    <section class="page-intro">
        <p class="eyebrow">Kelola akun</p>
        <h1>Data Admin</h1>
        <p>Tambah, lihat, ubah, atau hapus akun admin.</p>
    </section>

    <section class="table-card admin-card">
        <div class="table-heading">
            <div>
                <h2>Daftar Admin</h2>
                <p>{{ $admins->count() }} admin terdaftar</p>
            </div>
            <a class="button" href="{{ route('admin.create') }}">Tambah Admin</a>
        </div>

        @if (session('success'))
            <p class="admin-alert admin-alert-success">{{ session('success') }}</p>
        @endif

        @if ($admins->isEmpty())
            <p class="admin-empty">Belum ada data admin.</p>
        @else
            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th>ID Admin</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admin->id_admin }}</td>
                                <td>{{ $admin->username }}</td>
                                <td class="admin-actions">
                                    <a href="{{ route('admin.show', $admin) }}">Detail</a>
                                    <a href="{{ route('admin.edit', $admin) }}">Edit</a>
                                    <form action="{{ route('admin.destroy', $admin) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="admin-delete" type="submit">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
