@extends('layouts.app')

@section('title')
    Bienvenue | Application de Gestion des Congés
@endsection

@section('content')
<div class="container-fluid">
   

    <!-- Main Content -->
    <div class="row justify-content-center mt-40">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-white border-0 py-4">
                    <div class="text-center">
                        <div class="welcome-icon mb-3">
                            <i class="fas fa-hand-wave text-primary"></i>
                        </div>
                        <h2 class="mb-0">Bienvenue sur CongeApp</h2>
                    </div>
                </div>
                
                <div class="card-body p-5">
                    @guest
                        <div class="text-center">
                            <p class="lead mb-4 text-muted">
                                Que vous soyez un employé soumettant une demande ou un administrateur gérant les approbations, 
                                notre application est là pour vous aider.
                            </p>
                            <p class="mb-4">Veuillez vous connecter pour accéder à toutes les fonctionnalités.</p>
                            
                            <div class="d-grid gap-3">
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                                    <i class="fas fa-sign-in-alt mr-2"></i> Se connecter
                                </a>
                                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">
                                    <i class="fas fa-user-plus mr-2"></i> S'inscrire
                                </a>
                            </div>
                        </div>
                    @endguest

                    @auth
                        <div class="text-center">
                            <div class="user-welcome mb-4">
                                <div class="user-avatar mb-3">
                                    @if(Auth::user()->image && Auth::user()->image !== 'images/default-avatar.png')
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Avatar" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                                    @else
                                        <div class="avatar-placeholder">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    @endif
                                </div>
                                <h4 class="mb-2">Bienvenue, {{ Auth::user()->name }} !</h4>
                                <p class="text-muted mb-4">
                                    @if(Auth::user()->hasRole('admin'))
                                        Vous êtes connecté en tant qu'administrateur.
                                    @else
                                        Vous êtes connecté en tant qu'employé.
                                    @endif
                                </p>
                            </div>

                            <div class="d-grid gap-3">
                                @if(Auth::user()->hasRole('admin'))
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-success btn-lg">
                                        <i class="fas fa-tachometer-alt mr-2"></i> Tableau de Bord Admin
                                    </a>
                                @else
                                    <a href="{{ route('employes.dashboard') }}" class="btn btn-success btn-lg">
                                        <i class="fas fa-tachometer-alt mr-2"></i> Mon Tableau de Bord
                                    </a>
                                @endif
                                
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-lg w-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Se déconnecter
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endauth
                </div>
                
                <div class="card-footer bg-light border-0 text-center py-3">
                    <small class="text-muted">
                        <i class="fas fa-copyright mr-1"></i>
                        {{ date('Y') }} CongeApp. Tous droits réservés.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
    border-radius: 0 0 30px 30px;
    margin-bottom: 2rem;
    position: relative;
    overflow: hidden;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    z-index: -1;
}

.hero-stats {
    margin-top: 3rem;
}

.stat-item {
    padding: 1rem;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    transition: transform 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.stat-item:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.2);
}

.welcome-icon {
    font-size: 3rem;
    color: #007bff;
}

.user-avatar {
    display: flex;
    justify-content: center;
}

.avatar-placeholder {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
}

.card {
    border-radius: 20px;
    overflow: hidden;
}

.btn {
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
    padding: 0.75rem 2rem;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.15);
}

.btn-lg {
    padding: 1rem 2rem;
    font-size: 1.1rem;
}

.display-4 {
    font-weight: 700;
}

.lead {
    font-size: 1.2rem;
    font-weight: 400;
}

/* Ensure the hero section is visible */
.hero-section h1,
.hero-section p,
.hero-section .stat-item h4 {
    color: white !important;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.hero-section .stat-item i {
    color: white !important;
}
</style>
@endsection