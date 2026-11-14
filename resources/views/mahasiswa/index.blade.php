@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <section class="page-intro">
        <p class="eyebrow">Data kelas</p>
        <h1>Daftar Mahasiswa</h1>
        <p>Daftar nama, alamat, dan gender mahasiswa.</p>
    </section>

    <section class="table-card">
        <div class="table-heading">
            <div>
                <h2>Mahasiswa</h2>
                <p>{{ count($mahasiswa) }} mahasiswa terdaftar</p>
            </div>
            <span class="table-badge">Data praktikum</span>
        </div>
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $orang)
                        <tr>
                            <td class="student-name"><span class="student-avatar">{{ substr($orang['nama'], 0, 1) }}</span>{{ $orang['nama'] }}</td>
                            <td>{{ $orang['alamat'] }}</td>
                            <td><span class="gender-badge">{{ $orang['gender'] === 'L' ? 'Laki-laki' : 'Perempuan' }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
