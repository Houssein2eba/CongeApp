<?php

namespace App\Livewire\Departement;

use App\Models\Departement;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public $departements;

    public function mount()
    {
        $this->loadDepartements();
    }

    #[On('departmentCreated')]
    public function refreshList()
    {
        $this->loadDepartements(); // Reload the data
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
