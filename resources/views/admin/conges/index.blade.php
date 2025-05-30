@extends('adminlte::page')

@section('title', 'Demandes de Congé | Laravel Employés App')

@section('content_header')
    <h1 class="text-center text-primary fw-bold">📅 Gestion des Congés</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="bg-primary text-dark border-bottom text-center ">
                        <tr>
                            <th>ID</th> <!-- Ajout de la numérotation -->
                            <th>Employé</th>
                            <th>Type</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Justificatif</th>
                            <th>Statut</th>
                            <th>Motif</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-dark border">
                        @foreach($conges as $index => $conge)
                        <tr class="text-center">
                            <td class="fw-bold">{{ $index + 1}}</td> <!-- Ajout de la numérotation -->
                            <td>{{ $conge->user->name}}</td>
                            <td class="text-capitalize">{{ $conge->type}}</td>
                            <td>{{ \Carbon\Carbon::parse($conge->date_debut)->format('d M Y')}}</td>
                            <td>{{ \Carbon\Carbon::parse($conge->date_fin)->format('d M Y')}}</td>
                            <td>
                                @if($conge->justificatif)
                                    <a href="/storage{{ $conge->justificatif}}" target="_blank" class="btn btn-sm btn-info">
                                        📄 Voir Justificatif
                                    </a>
                                @else
                                    <span class="text-muted">Aucun justificatif</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{
                                    $conge->statut == 'Approuve'? 'success':
                                    ($conge->statut == 'Refuser'? 'danger': 'warning')}}">
                                    {{ ucfirst($conge->statut)}}
                                </span>
                            </td>
                            <td>{{ $conge->motif?? '-'}}</td>
                            <td>
                                <form action="{{ route('admin.conges.destroy', $conge->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-outline-danger btn-sm fw-bold">
                                        ❌ Refuser
                                    </button>
                                    
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('admin.conges.accept', $conge->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <!-- Bouton Approuver (Contour vert) -->
<button class="btn btn-outline-success btn-sm fw-bold">
    ✅ Approuver
</button>
</form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection
    