<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = \App\Models\Departement::with('users')->get();
        return view('departement.index', compact('departements'));
    }

    public function create()
    {
        return view('departement.create');
    }


}
