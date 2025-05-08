<?php

namespace App\Livewire\Departement;

use App\Models\Departement;
use Livewire\Component;

class Edit extends Component
{
    public $departmentId;
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255|unique:departements,name',
    ];

    public function mount($departmentId)
    {
        $department = Departement::findOrFail($departmentId);
        $this->departmentId = $departmentId;
        $this->name = $department->name;
        
        // Update unique validation rule to ignore current department
        $this->rules['name'] = "required|string|max:255|unique:departements,name,{$this->departmentId}";
    }

    public function update()
    {
        $this->validate();

        $department = Departement::findOrFail($this->departmentId);
        $department->update([
            'name' => $this->name
        ]);

        session()->flash('message', 'Département mis à jour avec succès.');
        $this->dispatch('departmentUpdated');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.departement.edit');
    }
}