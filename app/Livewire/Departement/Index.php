<?php

namespace App\Livewire\Departement;

use Livewire\Component;

class Index extends Component
{
    public $departements = [];


    protected $listeners = ['departmentCreated' => 'refreshList'];

    public function mount()
    {
        $this->loadDepartements();
    }

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
