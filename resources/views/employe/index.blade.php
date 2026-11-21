@extends('dashboard')

@section('content')
    <h2>{{ $judul }}</h2>

    @if ($employes->isEmpty())
        <p>Belum ada data pegawai.</p>
    @else
        <table class="employe-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Gender</th>
                    <th>Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employes as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->gaji }}</td>
                        <td>&mdash;</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
