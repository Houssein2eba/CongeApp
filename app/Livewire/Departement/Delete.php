<?php

namespace App\Livewire\Departement;

use Livewire\Component;

class Delete extends Component
{
    public $id;
    protected $rules = [
        'id' => 'required|exists:departements,id',
    ];
    public function delete()
    {
    dd($this->id);

        $this->validate();

        \App\Models\Departement::destroy($this->id);

        session()->flash('message', 'Department deleted successfully.');
        $this->dispatch('departementDeleted');

        return redirect()->route('departements.index');
    }
    public function render()
    {
        return view('livewire.departement.delete');
    }
}
