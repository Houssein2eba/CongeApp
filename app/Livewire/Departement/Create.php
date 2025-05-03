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
        $this->reset(['name']);
        $this->dispatch('departementCreated');

        session()->flash('message', 'Department created successfully.');

        return redirect()->route('departements.index');
    }
    public function render()
    {
        return view('livewire.departement.create');
    }
}
