<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreCongeRequest;
use App\Notifications\CongeStatusChanged;
use Carbon\Carbon;

class CongeController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
        'type' => 'required'
    ]);

    // Crée le congé en liant automatiquement l'employé connecté et son département
    auth()->user()->conges()->create([
        'start_date' => $validated['start_date'],
        'end_date' => $validated['end_date'],
        'type' => $validated['type'],
        'department_id' => auth()->user()->department_id, // On prend le département de l'employé
        'status' => 'pending' // Statut par défaut
    ]);

    return redirect()->route('conges.index')->with('success', 'Demande envoyée !');
}
}