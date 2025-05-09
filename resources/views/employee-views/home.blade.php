@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row my-5">
        <!-- Leave Balance Card -->
        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ auth()->user()->remaining_leave_days ?? 0 }}</h3>
                    <p>solde des congés </p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <a href="{{ url('employee/leaves') }}" class="small-box-footer">
                    Voir plus  <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Pending Requests Card -->
        <div class="col-md-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ auth()->user()->pending_leaves_count ?? 0 }}</h3>
                    <p>Demande de congé en attente</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clock"></i>
                </div>
                <a href="{{ url('employee/leaves/pending') }}" class="small-box-footer">
                    Voir plus  <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Department Info Card -->
        <div class="col-md-4">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ auth()->user()->departement->name ?? 'N/A' }}</h3>
                    <p>Your Department</p>
                </div>
                <div class="icon">
                    <i class="fas fa-building"></i>
                </div>
                <a href="{{ url('employee/department') }}" class="small-box-footer">
                    Voir plus <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Actions Card -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quick Actions</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <a href="{{ route('conge.create') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-plus-circle"></i><br>
                                Demander un congé

                            </a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="{{ url('employee/profile') }}" class="btn btn-info btn-lg">
                                <i class="fas fa-user-circle"></i><br>
                                Voir le profil

                            </a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="{{ url('employee/calendar') }}" class="btn btn-success btn-lg">
                                <i class="fas fa-calendar-alt"></i><br>
                                Calendrier des congés

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection