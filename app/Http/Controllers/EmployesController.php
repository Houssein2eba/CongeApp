<?php

namespace App\Http\Controllers;
use App\Models\Employe;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\User;

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
    
     public function show($id){
    $employe = Employe::find($id);

    if (!$employe) {
        return redirect()->route('employes.index')->with('error', 'Employé introuvable');
    }

    return view('employes.show', compact('employe'));
}
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $employe = Employe::find($id);

    if (!$employe) {
        return redirect()->route('employes.index')->with('error', 'Employé introuvable.');
    }

    return view('employes.edit', compact('employe'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $employe=Employe::where('registration_number',$id)->first();
        $validatedData =$request->validate([
            'registration_number'=>'required|numeric|unique:employes,id,'.$employe->registration_number,
            'fullname'=>'required',
            'departement'=>'required',
            'hire_date'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'city'=>'required',
        ]);
        // creer et enregistrer employe
        $employe->update($request->except('_token','_method'));
        return redirect()->route('employes.index')->with([
            'success' =>'Employé modifié avec succsè '
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //

        $employe=Employe::where('registration_number',$id)->first();
        $employe->delete();
        return redirect()->route('employes.index')->with([
           'success' =>'Employé supprimé avec succsè '
       ]);
    }
}
