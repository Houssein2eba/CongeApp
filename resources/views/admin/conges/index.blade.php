@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Liste des Demandes de Congé</h2>

    <div class="table-responsive shadow-lg">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Utilisateur</th>
                    <th>Type</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Justificatif</th>
                    <th>Statut</th>
                    <th>Motif</th>
                    <th>Remarque</th>
                </tr>
            </thead>
            <tbody>
                @foreach($conges as $conge)
                <tr>
                    <td>{{ $conge->user->name }}</td>
                    <td>{{ $conge->type }}</td>
                    <td>{{ $conge->date_debu }}</td>
                    <td>{{ $conge->date_fin }}</td>
                    <td>
                        <a href="{{ asset($conge->justificatif) }}" target="_blank">
                            <img src="{{ asset($conge->justificatif) }}" alt="" width="100px" height="100px">
                        </a>
                    </td>
                    <td>
                        <span class="badge badge-{{
                            $conge->statut == 'Approuve' ? 'success' :
                            ($conge->statut == 'Refuser' ? 'danger' : 'warning') }}">
                            {{ $conge->statut }}
                        </span>
                    </td>
                    <td>{{ $conge->motif ?? '-' }}</td>
                    <td>{{ $conge->remarque ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
