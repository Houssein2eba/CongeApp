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
        return view('conges.index', compact('conges'));
    }

    public function create()
    {
        return view('conges.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type_conge' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'motif' => 'required|string',
        ]);

        $conge = new Conge();
        $conge->type = $validated['type_conge'];
        $conge->date_debut = $validated['date_debut'];
        $conge->date_fin = $validated['date_fin'];
        $conge->motif = $validated['motif'];
        $conge->user_id = auth()->id();
        $conge->save();

        return redirect()->route('admin.conges.index')->with('success', 'Demande de congé créée avec succès');
    }
}
