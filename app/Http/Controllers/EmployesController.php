<?php

namespace App\Http\Controllers;
use App\Models\Employe;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes=User::with(['departement','roles','conges'])->whereHas('roles',function($query){$query->where('name','employee');})->get();

        return view('employes.index',compact('employes'));
    }

    public function create()
    {

        return view('employes.create');

    }

    /**
     * Store a newly created resource in storage.
     */




    // rediriger ou retourner reponse


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $employe =User::with(['departement','roles'])->findOrFail($id);
        return view('employes.show')->with([
            'employe' =>$employe

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $employe =User::with(['departement','roles'])->findOrFail($id);
        $departements = Departement::select('id','name')->get();
        return view('employes.edit')->with([
            'employe' =>$employe,
            'departements' =>$departements
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255',
            'departement_id' => 'required|integer|exists:departements,id',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[2-4][0-9]{7}$/',
        ]);
        DB::beginTransaction();
        $employe = User::findOrFail($id);
        $departement = Departement::findOrFail($request->departement_id);
        $employe->departement()->associate($departement);
        $employe->update([
            'name' => $request->name,
            'adress' => $request->address,
            'registration_number' => $request->registration_number,
            'city' => $request->city,
            'hire_date' => $request->hire_date,
            'phone' => $request->phone,

        ]);
        DB::commit();

        return redirect()->route('employes.index')->with([
            'success' => 'Employé modifié avec succès'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //

        $employe=User::findOrFail($id);
        $employe->delete();
        return redirect()->route('employes.index')->with([
           'success' =>'Employé supprimé avec succsè '
       ]);
    }
}
