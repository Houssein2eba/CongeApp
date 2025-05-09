{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Demande de congé') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.conges.store') }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="date_debut" class="col-md-4 col-form-label text-md-right">{{ __('Date de début') }}</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="date_debut" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="date_fin" class="col-md-4 col-form-label text-md-right">{{ __('Date de fin') }}</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="date_fin" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="type_conge" class="col-md-4 col-form-label text-md-right">{{ __('Type de congé') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="type_conge" required>
                                    <option value="annuel">Congé annuel</option>
                                    <option value="maladie">Congé maladie</option>
                                    <option value="exceptionnel">Congé exceptionnel</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="motif" class="col-md-4 col-form-label text-md-right">{{ __('Motif') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="motif" rows="3" required></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">{{ __('Envoyer') }}</button>
                            <a href="{{ route('admin.conges.index') }}" class="btn btn-secondary">
                                {{ __('Annuler') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
@extends('adminlte::page')

@section('title', 'Demande de congé')

@section('content')
    <h1>Demande de congé</h1>
    @livewire('conges-create')
@endsection


<div>
    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message')}}</div>
    @endif

    <form wire:submit.prevent="submit">
        <label>Type de congé:</label>
        <select wire:model="type" class="form-control">
            <option value="vacances">Vacances</option>
            <option value="maladie">Maladie</option>
            <option value="télétravail">Télétravail</option>
        </select>

        <label>Date de début:</label>
        <input type="date" wire:model="date_debut" class="form-control">

        <label>Date de fin:</label>
        <input type="date" wire:model="date_fin" class="form-control">

        <label>Motif (optionnel):</label>
        <textarea wire:model="motif" class="form-control"></textarea>

        <button type="submit" class="btn btn-primary mt-2">
            <i class="fas fa-paper-plane"></i> Envoyer la demande
        </button>
    </form>
</div>

