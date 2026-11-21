<?php

namespace App\Http\Controllers;

use App\Models\Employe;

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
}
