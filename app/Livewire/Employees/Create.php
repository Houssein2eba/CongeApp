<?php

namespace App\Livewire\Employees;
use App\Models\Departement;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class Create extends Component
{
    public $name='';
    public $email='';
    public $password='';
    public $registration_number='';
    public $departement='';
    public $hire_date='';
    public $phone='';
    public $address='';
    public $city='';

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'registration_number' => 'required|unique:users',
        'departement' => 'required|string|exists:departements,id',
        'hire_date' => 'required|date',
        'phone' => 'required|regex:/^[2-4][0-9]{7}$/',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'image'=>'required|image|max:2048',
    ];
    public $departements=[];

    public function mount()
    {
        $departements=Departement::get();
        $this->departements=$departements;
    }
    public function store()
    {
        $this->validate();

        DB::transaction(function () {
        $url = asset('storage/' . $this->file('image')->store('images', 'public'));

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'image'=> $url,
                'password' => bcrypt($this->password),
                'registration_number' => $this->registration_number,
                'hire_date' => $this->hire_date,
                'phone' => $this->phone,
                'address' => $this->address,
                'city' => $this->city,
                'departement_id' => $this->departement,
            ]);
            $user->assignRole('employee');
            $this->reset();

            return redirect()->route('employes.index')->with('success', 'Employé créé avec succès');
        });
    }


    public function render()
    {
        return view('livewire.employees.create');
    }
}
