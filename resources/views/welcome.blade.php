@extends('layouts.app')

@section('title')
    Bienvenue | Application de Gestion des Congés
@endsection

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg rounded-lg p-4">
                    <div class="card-header bg-primary text-white text-center py-3 rounded-top-lg">
                        <h2 class="mb-0">Bienvenue sur congeApp</h2>
                    </div>
                    <div class="card-body text-center p-5">
                        <p class="lead mb-4">
                            Simplifiez la gestion des demandes de congés de vos employés.
                            Que vous soyez un employé soumettant une demande ou un administrateur gérant les approbations, notre application est là pour vous aider.
                        </p>

                        @guest
                            <p class="mb-4">Veuillez vous connecter pour accéder à toutes les fonctionnalités.</p>
                            <a href="{{ url('/login') }}" class="btn btn-outline-primary btn-lg w-75">
                                <i class="fas fa-sign-in-alt me-2"></i> Se connecter
                            </a>
                        @endguest

                        @auth
                            <h4 class="mb-4">Bienvenue, {{ Auth::user()->name ?? 'Utilisateur' }} !</h4>
                            <p class="mb-4">Vous êtes connecté. Gérez vos congés ou accédez au tableau de bord.</p>

                            {{-- Exemple de bouton vers un tableau de bord (à adapter selon votre route) --}}
                            <a href="{{ url('/dashboard') }}" class="btn btn-success btn-lg w-75 mb-3">
                                <i class="fas fa-tachometer-alt me-2"></i> Accéder au Tableau de Bord
                            </a>

                            {{-- Formulaire de déconnexion --}}
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-lg w-75">
                                    <i class="fas fa-sign-out-alt me-2"></i> Se déconnecter
                                </button>
                            </form>
                        @endauth
                    </div>
                    <div class="card-footer text-muted text-center py-3 rounded-bottom-lg">
                        <small>&copy; {{ date('Y') }} congeApp. Tous droits réservés.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection