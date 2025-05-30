<?php

namespace App\Livewire\Employees;

use App\Models\Departement;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name = '';
    public $email = '';
    public $password = '';
    public $registration_number = '';
    public $departement = '';
    public $image;
    public $hire_date = '';
    public $phone = '';
    public $address = '';
    public $city = '';
    public $departements = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'registration_number' => 'required|unique:users',
        'departement' => 'required|exists:departements,id',
        'hire_date' => 'required|date',
        'phone' => 'required|regex:/^[2-4][0-9]{7}$/',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->departements = Departement::all();
}

    public function store()
    {
        $this->validate();

        DB::transaction(function () {
            $path = $this->image? $this->image->store('images', 'public'): 'default-avatar.png';
            $url = asset('storage/'. $path);

            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'image' => $url,
                'password' => bcrypt($this->password),
                'registration_number' => $this->registration_number,
                'hire_date' => $this->hire_date,
                'phone' => $this->phone,
                'address' => $this->address,
                'city' => $this->city,
                'departement_id' => $this->departement,
            ]);

            $user->assignRole('employee');
            session()->flash('message', '✅ تم إضافة الموظف بنجاح!');
            $this->reset();
});
}

    public function render()
    {
        return view('livewire.employees.create', [
            'departements' => $this->departements,
        ]);
}
}
