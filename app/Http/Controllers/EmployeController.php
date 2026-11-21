<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        $employes = Employe::all();

        return view('employe.index', [
            'judul' => 'Data Employe',
            'employes' => $employes,
        ]);
    }

    public function create()
    {
        return view('employe.create', [
            'judul' => 'Tambah data Pegawai',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => ['required', 'integer', 'unique:employes,id'],
            'nama' => ['required', 'string', 'max:30'],
            'alamat' => ['required', 'string'],
            'gender' => ['required', 'in:L,P'],
            'gaji' => ['required', 'integer', 'min:0'],
        ]);

        $employe = new Employe();
        $employe->id = $validated['id'];
        $employe->nama = $validated['nama'];
        $employe->alamat = $validated['alamat'];
        $employe->gender = $validated['gender'];
        $employe->gaji = $validated['gaji'];
        $employe->save();

        return redirect()
            ->route('employe.index')
            ->with('success', 'Data pegawai berhasil disimpan.');
    }

    public function show(Employe $employe)
    {
        return view('employe.edit', [
            'judul' => 'Edit data Pegawai',
            'employe' => $employe,
        ]);
    }

    public function update(Request $request, Employe $employe)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:30'],
            'alamat' => ['required', 'string'],
            'gender' => ['required', 'in:L,P'],
            'gaji' => ['required', 'integer', 'min:0'],
        ]);

        $employe->nama = $validated['nama'];
        $employe->alamat = $validated['alamat'];
        $employe->gender = $validated['gender'];
        $employe->gaji = $validated['gaji'];
        $employe->save();

        return redirect()
            ->route('employe.index')
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }
}
