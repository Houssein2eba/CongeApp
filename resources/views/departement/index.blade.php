@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Left Column: Department List -->
        <div class="col-md-6">
            <h4>Liste des Départements</h4>
            @livewire('departement.index')
        </div>

        <!-- Right Column: Create Form -->
        <div class="col-md-6">
            <h4>Créer un Département</h4>
            @livewire('departement.create')
        </div>
    </div>
</div>
@endsection
