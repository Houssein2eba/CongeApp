@extends('layouts.user')

@section('content')
<div class="container-fluid">
    <!-- Welcome Banner -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-banner bg-gradient-primary text-white border-0 shadow-lg">
                <div class="banner-content p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="mb-2">
                                <i class="fas fa-sun mr-2"></i>
                                Bonjour, {{ Auth::user()->name }}!
                            </h2>
                            <p class="mb-0 opacity-75">
                                Bienvenue sur votre espace personnel. Gérez vos congés et consultez vos informations.
                            </p>
                        </div>
                        <div class="col-md-4 text-right">
                            <div class="user-avatar">
                                @if(Auth::user()->image && Auth::user()->image !== 'images/default-avatar.png')
                                    <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Avatar" class="avatar-img">
                                @else
                                    <div class="avatar-placeholder">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-lg-4 col-md-6 mb-3">
            <div class="stats-card bg-gradient-info text-white border-0 shadow-lg">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon mr-3">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h3 class="mb-1">{{ auth()->user()->remaining_leave_days ?? 0 }}</h3>
                            <p class="mb-2 opacity-75">Jours de congé restants</p>
                            <a href="{{ route('employes.conge.index') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-eye mr-1"></i>Voir mes congés
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <div class="stats-card bg-gradient-warning text-white border-0 shadow-lg">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon mr-3">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h3 class="mb-1">{{ auth()->user()->pending_leaves_count ?? 0 }}</h3>
                            <p class="mb-2 opacity-75">Demandes en attente</p>
                            <a href="{{ route('employes.conge.index') }}" class="btn btn-light btn-sm">
                                <i class="fas fa-eye mr-1"></i>Suivre
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-3">
            <div class="stats-card bg-gradient-success text-white border-0 shadow-lg">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="stats-icon mr-3">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h3 class="mb-1">{{ auth()->user()->departement->name ?? 'N/A' }}</h3>
                            <p class="mb-2 opacity-75">Votre département</p>
                            <button class="btn btn-light btn-sm" onclick="showDepartmentInfo()">
                                <i class="fas fa-info mr-1"></i>Détails
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-bolt text-primary mr-2"></i>
                        Actions Rapides
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="quick-action-item">
                                <a href="{{ route('employes.conge.create') }}" class="quick-action-link">
                                    <div class="quick-action-card bg-primary text-white">
                                        <div class="card-body text-center p-4">
                                            <div class="action-icon mb-3">
                                                <i class="fas fa-plus-circle"></i>
                                            </div>
                                            <h6 class="mb-2">Demander un congé</h6>
                                            <small class="opacity-75">Nouvelle demande</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="quick-action-item">
                                <a href="{{ route('employes.conge.index') }}" class="quick-action-link">
                                    <div class="quick-action-card bg-info text-white">
                                        <div class="card-body text-center p-4">
                                            <div class="action-icon mb-3">
                                                <i class="fas fa-list-alt"></i>
                                            </div>
                                            <h6 class="mb-2">Mes congés</h6>
                                            <small class="opacity-75">Historique</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="quick-action-item">
                                <a href="#" class="quick-action-link" onclick="showProfile()">
                                    <div class="quick-action-card bg-success text-white">
                                        <div class="card-body text-center p-4">
                                            <div class="action-icon mb-3">
                                                <i class="fas fa-user-circle"></i>
                                            </div>
                                            <h6 class="mb-2">Mon profil</h6>
                                            <small class="opacity-75">Informations</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="quick-action-item">
                                <a href="#" class="quick-action-link" onclick="showCalendar()">
                                    <div class="quick-action-card bg-warning text-white">
                                        <div class="card-body text-center p-4">
                                            <div class="action-icon mb-3">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            <h6 class="mb-2">Calendrier</h6>
                                            <small class="opacity-75">Vue d'ensemble</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity & Notifications -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-history text-primary mr-2"></i>
                        Activité Récente
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="activity-timeline">
                        <div class="timeline-item p-3 border-bottom">
                            <div class="d-flex align-items-center">
                                <div class="timeline-icon bg-primary">
                                    <i class="fas fa-calendar-plus text-white"></i>
                                </div>
                                <div class="ml-3 flex-grow-1">
                                    <p class="mb-1"><strong>Demande de congé soumise</strong></p>
                                    <p class="text-muted mb-1">Congé du 15 au 20 décembre 2024</p>
                                    <small class="text-muted">Il y a 2 heures</small>
                                </div>
                                <span class="badge badge-warning">En attente</span>
                            </div>
                        </div>
                        <div class="timeline-item p-3 border-bottom">
                            <div class="d-flex align-items-center">
                                <div class="timeline-icon bg-success">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                                <div class="ml-3 flex-grow-1">
                                    <p class="mb-1"><strong>Congé approuvé</strong></p>
                                    <p class="text-muted mb-1">Congé du 10 au 12 novembre 2024</p>
                                    <small class="text-muted">Il y a 3 jours</small>
                                </div>
                                <span class="badge badge-success">Approuvé</span>
                            </div>
                        </div>
                        <div class="timeline-item p-3">
                            <div class="d-flex align-items-center">
                                <div class="timeline-icon bg-info">
                                    <i class="fas fa-user-edit text-white"></i>
                                </div>
                                <div class="ml-3 flex-grow-1">
                                    <p class="mb-1"><strong>Profil mis à jour</strong></p>
                                    <p class="text-muted mb-1">Informations personnelles modifiées</p>
                                    <small class="text-muted">Il y a 1 semaine</small>
                                </div>
                                <span class="badge badge-info">Complété</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0">
                        <i class="fas fa-bell text-primary mr-2"></i>
                        Notifications
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="notification-list">
                        <div class="notification-item p-3 border-bottom">
                            <div class="d-flex align-items-start">
                                <div class="notification-icon bg-warning">
                                    <i class="fas fa-exclamation text-white"></i>
                                </div>
                                <div class="ml-3 flex-grow-1">
                                    <p class="mb-1"><strong>Rappel de congé</strong></p>
                                    <small class="text-muted">Votre demande de congé est en attente depuis 3 jours</small>
                                </div>
                            </div>
                        </div>
                        <div class="notification-item p-3 border-bottom">
                            <div class="d-flex align-items-start">
                                <div class="notification-icon bg-info">
                                    <i class="fas fa-info text-white"></i>
                                </div>
                                <div class="ml-3 flex-grow-1">
                                    <p class="mb-1"><strong>Nouvelle fonctionnalité</strong></p>
                                    <small class="text-muted">Le calendrier des congés est maintenant disponible</small>
                                </div>
                            </div>
                        </div>
                        <div class="notification-item p-3">
                            <div class="d-flex align-items-start">
                                <div class="notification-icon bg-success">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                                <div class="ml-3 flex-grow-1">
                                    <p class="mb-1"><strong>Profil complet</strong></p>
                                    <small class="text-muted">Toutes vos informations sont à jour</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
.welcome-banner {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 20px;
}

.user-avatar {
    display: flex;
    justify-content: flex-end;
}

.avatar-img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 4px solid rgba(255, 255, 255, 0.3);
    object-fit: cover;
}

.avatar-placeholder {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    border: 4px solid rgba(255, 255, 255, 0.3);
}

.stats-card {
    border-radius: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stats-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
}

.stats-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    background: rgba(255, 255, 255, 0.2);
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.bg-gradient-info {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}

.bg-gradient-warning {
    background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
}

.bg-gradient-success {
    background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
}

.quick-action-item {
    transition: transform 0.3s ease;
}

.quick-action-item:hover {
    transform: translateY(-5px);
}

.quick-action-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.quick-action-card {
    border-radius: 15px;
    transition: all 0.3s ease;
    height: 100%;
}

.quick-action-card:hover {
    transform: scale(1.05);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.action-icon {
    font-size: 2.5rem;
    opacity: 0.8;
}

.timeline-icon, .notification-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
}

.activity-timeline, .notification-list {
    max-height: 400px;
    overflow-y: auto;
}

.timeline-item, .notification-item {
    transition: background-color 0.2s ease;
}

.timeline-item:hover, .notification-item:hover {
    background-color: #f8f9fa;
}

.card {
    border-radius: 15px;
    overflow: hidden;
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
</style>
@endsection

@section('js')
<script>
function showDepartmentInfo() {
    Swal.fire({
        title: 'Informations Département',
        html: `
            <div class="text-left">
                <p><strong>Nom:</strong> {{ auth()->user()->departement->name ?? 'N/A' }}</p>
                <p><strong>Description:</strong> {{ auth()->user()->departement->description ?? 'Aucune description disponible' }}</p>
                <p><strong>Date de création:</strong> {{ auth()->user()->departement->created_at ? auth()->user()->departement->created_at->format('d/m/Y') : 'N/A' }}</p>
            </div>
        `,
        icon: 'info',
        confirmButtonText: 'Fermer'
    });
}

function showProfile() {
    Swal.fire({
        title: 'Mon Profil',
        html: `
            <div class="text-left">
                <p><strong>Nom:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Numéro d'enregistrement:</strong> {{ auth()->user()->registration_number }}</p>
                <p><strong>Téléphone:</strong> {{ auth()->user()->phone }}</p>
                <p><strong>Ville:</strong> {{ auth()->user()->city }}</p>
                <p><strong>Date d'embauche:</strong> {{ auth()->user()->hire_date ? \Carbon\Carbon::parse(auth()->user()->hire_date)->format('d/m/Y') : 'N/A' }}</p>
            </div>
        `,
        icon: 'info',
        confirmButtonText: 'Fermer'
    });
}

function showCalendar() {
    Swal.fire({
        title: 'Calendrier des Congés',
        text: 'Fonctionnalité de calendrier à venir!',
        icon: 'info',
        confirmButtonText: 'OK'
    });
}
</script>
@endsection
