@extends('layouts.app')

@section('title', 'Kalkulator Sederhana')

@section('content')
    <section class="calculator-wrap">
        <div class="calculator-intro">
            <p class="eyebrow">Alat hitung</p>
            <h1>Kalkulator sederhana</h1>
            <p>Masukkan dua angka untuk menghitung hasil perkaliannya.</p>
            <a class="text-link" href="{{ route('kalkulator.segitiga') }}">Mau hitung luas segitiga? <span aria-hidden="true">&rarr;</span></a>
        </div>
        <div class="calculator-card">
            <form action="{{ route('kalkulator.proses') }}" method="POST">
                @csrf
                <label for="angka1">Angka pertama</label>
                <input id="angka1" name="angka1" type="number" step="any" value="{{ old('angka1', 0) }}" required>
                @error('angka1') <p class="field-error">{{ $message }}</p> @enderror

                <label for="angka2">Angka kedua</label>
                <input id="angka2" name="angka2" type="number" step="any" value="{{ old('angka2', 0) }}" required>
                @error('angka2') <p class="field-error">{{ $message }}</p> @enderror

                <button class="button" type="submit">Hitung hasil <span aria-hidden="true">&rarr;</span></button>
            </form>

            @isset($hasil)
                <div class="result-box" role="status">
                    <span>Hasil perkalian</span>
                    <strong>{{ number_format((float) $hasil, 2, ',', '.') }}</strong>
                </div>
            @endisset
        </div>
    </section>
@endsection
