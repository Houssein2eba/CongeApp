@extends('adminlte::page')

@section('title')
    Départements | Laravel Employes App
@endsection

@section('content_header')
    <h1>Gestion des Départements</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Left Column: Department List -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste des Départements</h3>
                </div>
                <div class="card-body">
                    @livewire('departement.index', ['departements' => $departements])
                </div>
            </div>
        </div>

        <!-- Right Column: Create Form -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Créer un Département</h3>
                </div>
                <div class="card-body">
                    @livewire('departement.create')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    @if (session()->has('message'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session()->get('message') }}",
                showConfirmButton: false,
                timer: 3000,
                toast: true
            });
        </script>
    @endif
@endsection
