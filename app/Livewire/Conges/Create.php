<?php

namespace App\Livewire\Conges;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Conge;

class Create extends Component
{
    
        public $type, $date_debut, $date_fin, $motif;
    
        protected $rules = [
            'type' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'motif' => 'nullable|string|max:255',
        ];
    
        public function submit()
        {
            $this->validate();
    
            Conge::create([
                'user_id' => Auth::id(),
                'type' => $this->type,
                'date_debut' => $this->date_debut,
                'date_fin' => $this->date_fin,
                'motif' => $this->motif,
                'statut' => 'En attente',
                'approved_at' => null,
                'remarque' => null,
            ]);
    
            session()->flash('message', 'Demande de congé envoyée avec succès!');
        }
    
        public function render()
        {
            return view('livewire.conges.create');
        }
    
    
}
