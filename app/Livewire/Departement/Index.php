<?php

namespace App\Livewire\Departement;

use App\Models\Departement;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $departements;

    public function mount($departements = null)
    {
        if ($departements) {
            $this->departements = $departements;
        } else {
            $this->loadDepartements();
        }
    }

    #[On('departmentCreated')]
    public function refreshList()
    {
        $this->loadDepartements();
    }

    public function loadDepartements()
    {
        $this->departements = \App\Models\Departement::get();
    }

    public function render()
    {
        return view('livewire.departement.index');
    }
}
