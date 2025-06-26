@extends('adminlte::page')

@section('title', 'Gestion des Congés | Laravel Employés App')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">
            <i class="fas fa-calendar-alt text-primary"></i>
            Gestion des Congés
        </h1>
        <div class="d-flex">
            <span class="badge badge-primary badge-pill p-2 mr-2">
                <i class="fas fa-clock mr-1"></i>
                {{ now()->format('d/m/Y H:i') }}
            </span>
        </div>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card border-0 shadow-lg">
                <div class="card-body text-center p-4">
                    <div class="stats-icon bg-gradient-primary mb-3">
                        <i class="fas fa-clock text-white"></i>
                    </div>
                    <h2 class="text-primary mb-1">{{ $conges->where('statut', 'En attente')->count() }}</h2>
                    <p class="text-muted mb-3">En Attente</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card border-0 shadow-lg">
                <div class="card-body text-center p-4">
                    <div class="stats-icon bg-gradient-success mb-3">
                        <i class="fas fa-check text-white"></i>
                    </div>
                    <h2 class="text-success mb-1">{{ $conges->where('statut', 'Approuve')->count() }}</h2>
                    <p class="text-muted mb-3">Approuvés</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card border-0 shadow-lg">
                <div class="card-body text-center p-4">
                    <div class="stats-icon bg-gradient-danger mb-3">
                        <i class="fas fa-times text-white"></i>
                    </div>
                    <h2 class="text-danger mb-1">{{ $conges->where('statut', 'Refuser')->count() }}</h2>
                    <p class="text-muted mb-3">Refusés</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card border-0 shadow-lg">
                <div class="card-body text-center p-4">
                    <div class="stats-icon bg-gradient-info mb-3">
                        <i class="fas fa-calendar-check text-white"></i>
                    </div>
                    <h2 class="text-info mb-1">{{ $conges->count() }}</h2>
                    <p class="text-muted mb-3">Total Demandes</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="card shadow-lg border-0">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-list mr-2"></i>
                    Liste des Demandes de Congé
                </h5>
                <div class="d-flex">
                    <span class="badge badge-primary badge-pill p-2">
                        <i class="fas fa-calendar mr-1"></i>
                        {{ $conges->count() }} demande(s)
                    </span>
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th class="border-0 py-3">
                                <i class="fas fa-hashtag mr-1"></i>ID
                            </th>
                            <th class="border-0 py-3">
                                <i class="fas fa-user mr-1"></i>Employé
                            </th>
                            <th class="border-0 py-3">
                                <i class="fas fa-calendar mr-1"></i>Type
                            </th>
                            <th class="border-0 py-3">
                                <i class="fas fa-calendar-day mr-1"></i>Date Début
                            </th>
                            <th class="border-0 py-3">
                                <i class="fas fa-calendar-day mr-1"></i>Date Fin
                            </th>
                            <th class="border-0 py-3">
                                <i class="fas fa-file-alt mr-1"></i>Justificatif
                            </th>
                            <th class="border-0 py-3">
                                <i class="fas fa-info-circle mr-1"></i>Statut
                            </th>
                            <th class="border-0 py-3">
                                <i class="fas fa-comment mr-1"></i>Motif
                            </th>
                            <th class="border-0 py-3 text-center">
                                <i class="fas fa-cogs mr-1"></i>Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($conges as $index => $conge)
                        <tr class="border-bottom">
                            <td class="align-middle">
                                <span class="badge badge-secondary badge-pill">{{ $index + 1 }}</span>
                            </td>
                            <td class="align-middle">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm mr-3">
                                        @if ($conge->user->image && $conge->user->image !== 'images/default-avatar.png')
                                            <img src="{{ asset('storage/' . $conge->user->image) }}" alt="Avatar" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                                        @else
                                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="fas fa-user text-white"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <h6 class="mb-0 font-weight-bold">{{ $conge->user->name }}</h6>
                                        <small class="text-muted">{{ $conge->user->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <span class="badge badge-info badge-pill text-capitalize">{{ $conge->type }}</span>
                            </td>
                            <td class="align-middle">
                                <span class="text-muted">{{ \Carbon\Carbon::parse($conge->date_debut)->format('d/m/Y') }}</span>
                            </td>
                            <td class="align-middle">
                                <span class="text-muted">{{ \Carbon\Carbon::parse($conge->date_fin)->format('d/m/Y') }}</span>
                            </td>
                            <td class="align-middle">
                                @if($conge->justificatif)
                                    <a href="/storage{{ $conge->justificatif }}" target="_blank" class="btn btn-outline-info btn-sm">
                                        <i class="fas fa-file-alt mr-1"></i>Voir
                                    </a>
                                @else
                                    <span class="text-muted">
                                        <i class="fas fa-times mr-1"></i>Aucun
                                    </span>
                                @endif
                            </td>
                            <td class="align-middle">
                                @if($conge->statut == 'Approuve')
                                    <span class="badge badge-success badge-pill">
                                        <i class="fas fa-check mr-1"></i>Approuvé
                                    </span>
                                @elseif($conge->statut == 'Refuser')
                                    <span class="badge badge-danger badge-pill">
                                        <i class="fas fa-times mr-1"></i>Refusé
                                    </span>
                                @else
                                    <span class="badge badge-warning badge-pill">
                                        <i class="fas fa-clock mr-1"></i>En attente
                                    </span>
                                @endif
                            </td>
                            <td class="align-middle">
                                <span class="text-muted">{{ $conge->motif ?? '-' }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group" role="group">
                                    @if($conge->statut == 'En attente')
                                        <form action="{{ route('admin.conges.accept', $conge->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm mr-1" 
                                                    onclick="return confirm('Êtes-vous sûr de vouloir approuver cette demande?')">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.conges.destroy', $conge->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Êtes-vous sûr de vouloir refuser cette demande?')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-muted">Traité</span>
                                    @endif
                                </div>
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

@section('css')
<style>
.card {
    border-radius: 15px;
    transition: transform 0.2s ease;
}

.card:hover {
    transform: translateY(-2px);
}

.stats-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin: 0 auto;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.bg-gradient-success {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}

.bg-gradient-danger {
    background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
}

.bg-gradient-info {
    background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
}

.btn {
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.15);
}

.badge {
    border-radius: 20px;
    padding: 0.5em 1em;
}

.avatar-sm {
    flex-shrink: 0;
}

.table th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.5px;
}

.table td {
    vertical-align: middle;
}
</style>
@endsection
    