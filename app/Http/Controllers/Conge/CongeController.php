<?php

namespace App\Http\Controllers\Conge;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CongeController extends Controller
{
    public function create()
    {
        return view('conges.create');
    }
}
