<?php

namespace App\Livewire\Departement;

use App\Models\Departement;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $departements;
    public $departmentToDelete = null;

    public function mount($departements = null)
    {
        if ($departements) {
            $this->departements = $departements;
        } else {
            $this->loadDepartements();
        }
    }

    #[On('departmentCreated')]
    #[On('departmentDeleted')]
    public function refreshList()
    {
        $this->loadDepartements();
    }

    public function loadDepartements()
    {
        $this->departements = Departement::get();
    }

    

    public function delete($id)
    {
        
        Departement::find($id)->delete();
        session()->flash('message', 'Department deleted successfully.');
        $this->dispatch('departmentDeleted');
    }

    public function render()
    {
        return view('livewire.departement.index');
    }
}
