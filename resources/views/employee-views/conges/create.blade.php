@extends('layouts.user')

@section('content')
    <h1>Demande de congé</h1>

    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message')}}</div>
    @endif

    <form action="{{ route('employe.conge.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label>Type de congé:</label>
            <select name="type" class="form-control">
                <option value="vacances">Vacances</option>
                <option value="maladie">Maladie</option>
                <option value="télétravail">Télétravail</option>
            </select>
        </div>

        <div class="form-group">
            <label>Date de début:</label>
            <input type="date" name="date_debut" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Date de fin:</label>
            <input type="date" name="date_fin" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Motif (optionnel):</label>
            <textarea name="motif" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-paper-plane"></i> Envoyer la demande
        </button>
    </form>
@endsection
