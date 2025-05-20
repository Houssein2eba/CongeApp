<?php

namespace App\Livewire\User\Conge;

use App\Models\Conge;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $type='';
    public $dateDebut='';
    public $dateFin= '';
    public $justificatif;
    public $motif='';






    public function store(){

          $e= $this->validate([
        'type' => 'required|string|in:vacances,maladie,télétravail',
        'dateDebut' => 'required|date',
        'dateFin' => 'required|date|after:dateDebut',
        'justificatif' => 'required|mimes:pdf,jpg,png',
        'motif' => 'nullable|string',
    ]);
    dd($e);


        $this->justificatif ? $url = $this->justificatif->store('justificatifs','public') : $url = null;
        dd(''.$url);
        $c=Conge::create([
            'type' => $this->type,
            'date_debut' => $this->dateDebut,
            'date_fin' => $this->dateFin,
            'motif' => $this->motif,
            'justificatif' => $url,
            'user_id' => auth()->user()->id
        ]);
        dd($c);


        $this->dispatch('alert', 'Congé envoyé avec succès', 'success');

        $this->reset(['type', 'dateDebut', 'dateFin', 'justificatif', 'motif']);




    }
    public function render()
    {
        return view('livewire.user.conge.create');
    }
}
