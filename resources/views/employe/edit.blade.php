@extends('dashboard')

@section('content')
    <h2>{{ $judul }}</h2>

    <form class="employe-form" action="{{ route('employe.update', $employe) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id">ID</label>
        <input id="id" type="number" value="{{ $employe->id }}" disabled>

        <label for="nama">Nama</label>
        <input id="nama" name="nama" type="text" maxlength="30" value="{{ old('nama', $employe->nama) }}" required>
        @error('nama')
            <p class="employe-error">{{ $message }}</p>
        @enderror

        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat" rows="4" required>{{ old('alamat', $employe->alamat) }}</textarea>
        @error('alamat')
            <p class="employe-error">{{ $message }}</p>
        @enderror

        <label for="gender">Gender</label>
        <select id="gender" name="gender" required>
            <option value="L" @selected(old('gender', $employe->gender) === 'L')>Laki-laki</option>
            <option value="P" @selected(old('gender', $employe->gender) === 'P')>Perempuan</option>
        </select>
        @error('gender')
            <p class="employe-error">{{ $message }}</p>
        @enderror

        <label for="gaji">Gaji</label>
        <input id="gaji" name="gaji" type="number" min="0" value="{{ old('gaji', $employe->gaji) }}" required>
        @error('gaji')
            <p class="employe-error">{{ $message }}</p>
        @enderror

        <button class="employe-button" type="submit">Update</button>
    </form>
@endsection
