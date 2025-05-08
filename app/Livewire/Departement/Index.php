<?php

namespace App\Livewire\Departement;

use App\Models\Departement;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    
    public $departements;
    
    public $editingDepartmentId = null;
    public $editingName = '';

    protected $rules = [
        'editingName' => 'required|string|max:255',
    ];

    public function mount($departements = null)
    {
        if ($departements) {
            $this->departements = $departements;
        } else {
            $this->loadDepartements();
        }
    }

    #[On('departmentCreated')]
    #[On('departmentUpdated')]
    #[On('departmentDeleted')]
    public function refreshList()
    {
        $this->loadDepartements();
    }

    public function loadDepartements()
    {
        $this->departements = Departement::get();
    }

    public function confirmDelete($id)
    {
        $this->departmentToDelete = $id;
    }

    public function delete($id)
    {
        $department = Departement::findOrFail($id);
        $department->delete();

        
        session()->flash('message', 'Département supprimé avec succès.');
        $this->dispatch('departmentDeleted');
    }

    public function editDepartment($id)
    {
        $this->editingDepartmentId = $id;
    }

    public function startEdit($id)
    {
        $department = Departement::findOrFail($id);
        $this->editingDepartmentId = $id;
        $this->editingName = $department->name;
        $this->rules['editingName'] = "required|string|max:255|unique:departements,name,{$id}";
    }

    public function cancelEdit()
    {
        $this->editingDepartmentId = null;
        $this->editingName = '';
        $this->resetValidation();
    }

    public function updateDepartment()
    {
        $this->validate();

        $department = Departement::findOrFail($this->editingDepartmentId);
        $department->update([
            'name' => $this->editingName
        ]);

        $this->editingDepartmentId = null;
        $this->editingName = '';
        session()->flash('message', 'Département mis à jour avec succès.');
        $this->dispatch('departmentUpdated');
    }

    public function render()
    {
        return view('livewire.departement.index');
    }
}
