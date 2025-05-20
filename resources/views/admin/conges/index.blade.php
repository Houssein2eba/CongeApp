@extends('adminlte::page')

@section('title')
    Demandes de Congé | Laravel Employes App
@endsection

@section('content_header')
    <h1>Gestion des Congé</h1>
@endsection
@section('content')
<div class="container">


    <div class="table-responsive shadow-lg">
        <table class="table table-striped table-hover">
            <thead class="thead-dark text-center">
                <tr>
                    <th>Utilisateur</th>
                    <th>Type</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Justificatif</th>
                    <th>Statut</th>
                    <th>Motif</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($conges as $conge)
                <tr>
                    <td>{{ $conge->user->name }}</td>
                    <td>{{ $conge->type }}</td>
                    <td>{{ $conge->date_debut }}</td>
                    <td>{{ $conge->date_fin }}</td>
                    <td>
                        <a href="/storage{{ $conge->justificatif }}" target="_blank">
                            <img src="/storage{{ $conge->justificatif }}" alt="" width="100px" height="100px">
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
                    <td>
                        <form action="{{ route('admin.conges.destroy', $conge->id) }}" method="post">
                            <button class="btn btn-danger" type="submit">Refuser</button> @csrf @method('PUT')></form></td>
                    <td><a href="">Accepter or not</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
