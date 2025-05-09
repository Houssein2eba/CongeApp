<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conge;

class CongeController extends Controller
{
    public function index()
    {
        $conges = Conge::with('user')->get();
        return view('admin.conges.index', compact('conges'));
    }


}
