<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'admins' => Admin::query()->orderBy('id_admin')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_admin' => ['required', 'integer', 'min:1', 'unique:admins,id_admin'],
            'username' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'max:100'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        Admin::create($validated);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function show(Admin $admin)
    {
        return view('admin.show', compact('admin'));
    }

    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'password' => ['nullable', 'string', 'min:8', 'max:100'],
        ]);

        if (! isset($validated['password']) || $validated['password'] === '') {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $admin->update($validated);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui.');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus.');
    }
}
