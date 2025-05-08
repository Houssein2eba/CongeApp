<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::with('users')->get();
        return view('departement.index', compact('departements'));
    }

    public function create()
    {
        return view('departement.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departements,name',
        ]);

        Departement::create($validated);

        return redirect()->route('admin.departements.index')
            ->with('success', 'Département créé avec succès');
    }

    public function edit(Departement $departement)
    {
        return view('departement.edit', compact('departement'));
    }

    public function update(Request $request, Departement $departement)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:departements,name,' . $departement->id,
        ]);

        $departement->update($validated);

        return redirect()->route('admin.departements.index')
            ->with('success', 'Département mis à jour avec succès');
    }

    public function destroy(Departement $departement)
    {
        $departement->delete();

        return redirect()->route('admin.departements.index')
            ->with('success', 'Département supprimé avec succès');
    }
}
