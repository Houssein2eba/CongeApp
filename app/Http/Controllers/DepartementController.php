<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        return view('departement.index');
    }

    public function create()
    {
        return view('departement.create');
    }

   
}
