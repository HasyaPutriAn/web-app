@extends('layouts.app')

@section('title', 'Kalkulator Luas Segitiga')

@section('content')
    <section class="calculator-wrap">
        <div class="calculator-intro">
            <p class="eyebrow">Alat hitung</p>
            <h1>Luas segitiga</h1>
            <p>Isi panjang alas dan tinggi. Luas dihitung dengan rumus setengah kali alas kali tinggi.</p>
            <a class="text-link" href="{{ route('kalkulator.home') }}">Kembali ke kalkulator <span aria-hidden="true">&rarr;</span></a>
        </div>
        <div class="calculator-card">
            <form action="{{ route('kalkulator.segitiga.proses') }}" method="POST">
                @csrf
                <label for="alas">Alas</label>
                <input id="alas" name="alas" type="number" min="0" step="any" value="{{ old('alas') }}" placeholder="Contoh: 12" required>
                @error('alas') <p class="field-error">{{ $message }}</p> @enderror

                <label for="tinggi">Tinggi</label>
                <input id="tinggi" name="tinggi" type="number" min="0" step="any" value="{{ old('tinggi') }}" placeholder="Contoh: 8" required>
                @error('tinggi') <p class="field-error">{{ $message }}</p> @enderror

                <button class="button" type="submit">Hitung luas <span aria-hidden="true">&rarr;</span></button>
            </form>

            @isset($hasil)
                <div class="result-box" role="status">
                    <span>Luas segitiga</span>
                    <strong>{{ number_format((float) $hasil, 2, ',', '.') }} <small>satuan<sup>2</sup></small></strong>
                </div>
            @endisset
        </div>
    </section>
@endsection
