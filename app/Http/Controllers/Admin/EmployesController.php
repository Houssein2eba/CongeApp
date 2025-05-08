<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployesController extends Controller
{
    public function index()
    {
        $employes = User::with(['departement', 'roles', 'conges'])
            ->whereHas('roles', function($query) {
                $query->where('name', 'employee');
            })
            ->get();

        return view('employes.index', compact('employes'));
    }

    public function create()
    {
        return view('employes.create');
    }

    public function show(string $id)
    {
        $employe = User::with(['departement', 'roles'])->findOrFail($id);
        return view('employes.show', compact('employe'));
    }

    public function edit($id)
    {
        $employe = User::with(['departement', 'roles'])->findOrFail($id);
        $departements = Departement::select('id', 'name')->get();
        
        return view('employes.edit', compact('employe', 'departements'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255',
            'departement_id' => 'required|integer|exists:departements,id',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[2-4][0-9]{7}$/',
            'hire_date' => 'required|date'
        ]);

        DB::transaction(function() use ($validated, $id) {
            $employe = User::findOrFail($id);
            $departement = Departement::findOrFail($validated['departement_id']);
            
            $employe->departement()->associate($departement);
            $employe->update([
                'name' => $validated['name'],
                'address' => $validated['address'],
                'registration_number' => $validated['registration_number'],
                'city' => $validated['city'],
                'hire_date' => $validated['hire_date'],
                'phone' => $validated['phone'],
            ]);
        });

        return redirect()->route('admin.employes.index')
            ->with('success', 'Employé modifié avec succès');
    }

    public function destroy($id)
    {
        $employe = User::findOrFail($id);
        $employe->delete();
        
        return redirect()->route('admin.employes.index')
            ->with('success', 'Employé supprimé avec succès');
    }
}
