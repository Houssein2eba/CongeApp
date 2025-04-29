<?php

namespace App\Http\Controllers;
use App\Models\Employe;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;



class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes=Employe::all();
        return view('employes.index')->with([
            'employes'=>$employes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employes.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData =$request->validate([
            'registration_number'=>'required|numeric|unique:employes,registration_number',
            'fullname'=>'required',
            'departement'=>'required',
            'hire_date'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'city'=>'required',
        ]);
        // creer et enregistrer employe
        Employe:: create($request->except('_token'));
        return redirect()->route('employes.index')->with([
            'success' =>'Employé ajouté avec succsè '
        ]);
    }
        
    

    // rediriger ou retourner reponse
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $employe =Employe::where('registration_number',$id)->first();
        return view('employes.show')->with([
            'employe' =>$employe
        
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $employe =Employe::where('registration_number',$id)->first();
        return view('employes.edit')->with([
            'employe' =>$employe
        
        ]);

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
