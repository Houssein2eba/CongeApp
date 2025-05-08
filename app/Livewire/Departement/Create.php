<?php

namespace App\Livewire\Departement;

use Livewire\Component;

class Create extends Component
{
    public $name = '';

    protected $rules = [
        'name' => 'required|string|max:255|unique:departements,name',
    ];
    public function store()
    {
        $this->validate();

        \App\Models\Departement::create([
            'name' => $this->name,
        ]);
        session()->flash('message', 'Département créé avec succès.');

        $this->reset();
        $this->dispatch('departmentCreated');
    }
    public function render()
    {
        return view('livewire.departement.create');
    }
}
