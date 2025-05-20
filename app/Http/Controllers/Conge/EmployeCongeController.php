<?php

namespace App\Http\Controllers\Conge;

use App\Http\Controllers\Controller;
use App\Mail\AdminCongeMail;
use App\Models\Conge;
use App\Service\AdminService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmployeCongeController extends Controller
{
    public AdminService $adminservice;

    public function __construct(AdminService $adminservice)
    {
        $this->adminservice=$adminservice;
    }
    public function index()
    {
        $user=Auth::user();

        $conges=$user->conges()->get();

        return view("employee-views.conges.index",compact("conges"));
    }
    public function create()
    {
        return view('employee-views.conges.create');
    }

public function store(Request $request)
{
    $request->validate([
        'type' => 'required|string|in:vacances,maladie,télétravail',
        'date_debut' => 'required|date',
        'date_fin' => 'required|date|after:date_debut',
        'justificatif' => 'required|mimes:pdf,jpg,png',
        'motif' => 'nullable|string',
    ]);


    DB::beginTransaction();

    try {

        $user = Auth::user();
        // if($user->conges()->where('statut', 'En attente')->count() > 0){

        //     throw new Exception('Vous avez deja une demande en cours');
        // }

        // Handle justificatif upload
        if ($request->hasFile('justificatif')) {
            $justificatifPath = $request->file('justificatif')->store('justificatifs', 'public');
        } else {
            throw new Exception('Le fichier justificatif est requis.');
        }

        // Create the congé
        $conge =Conge::create([
            'type' => $request->type,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'motif' => $request->motif,
            'justificatif' => $justificatifPath,
            'user_id' => $user->id,
            'status' => 'En attente',
            
        ]);

        Mail::queue(new AdminCongeMail($this->adminservice->getAdmins(),"Congé envoyé par ".$user->name,$conge->motif ?? 'pas de motif','http://127.0.0.1:8000/admin/conges'));

        DB::commit();

        return redirect()
            ->route('employe.conge.index')
            ->with('success', 'Congé envoyé avec succès');

    } catch (Exception $e) {
        DB::rollBack();

        return redirect()
            ->to(route('employe.conge.index'))
            ->withInput()
            ->with('error', 'Erreur lors de l’envoi du congé : ' . $e->getMessage());
    }
}

}
