<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function home()
    {
        return view('kalkulator.index');
    }

    public function proses(Request $request)
    {
        $angka = $request->validate([
            'angka1' => ['required', 'numeric'],
            'angka2' => ['required', 'numeric'],
        ]);

        return view('kalkulator.index', [
            'hasil' => $angka['angka1'] * $angka['angka2'],
        ]);
    }

    public function segitiga(Request $request)
    {
        $hasil = null;

        if ($request->isMethod('post')) {
            $ukuran = $request->validate([
                'alas' => ['required', 'numeric', 'min:0'],
                'tinggi' => ['required', 'numeric', 'min:0'],
            ]);

            $hasil = $ukuran['alas'] * $ukuran['tinggi'] / 2;
        }

        return view('kalkulator.segitiga', compact('hasil'));
    }
}
