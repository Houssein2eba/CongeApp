@extends('layouts.user')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4>👤 Afficher un employé</h4>
                </div>
                <div class="card-body p-4">
                    @include('layouts.alert')

                    @if(isset($employe))
                        <table class="table table-bordered">
                            <tr>
                                <th class="fw-bold text-primary">N° d’enregistrement:</th>
                                <td>{{ $employe->registration_number}}</td>
                            </tr>
                            <tr>
                                <th class="fw-bold text-primary">Nom Complet:</th>
                                <td>{{ $employe->name}}</td>
                            </tr>
                            <tr>
                                <th class="fw-bold text-primary">Département:</th>
                                <td>{{ $employe->departement->name}}</td>
                            </tr>
                            <tr>
                                <th class="fw-bold text-primary">Date d’embauche:</th>
                                <td>{{ $employe->hire_date}}</td>
                            </tr>
                            <tr>
                                <th class="fw-bold text-primary">Email:</th>
                                <td>{{ $employe->email}}</td>
                            </tr>
                            <tr>
                                <th class="fw-bold text-primary">Téléphone:</th>
                                <td>{{ $employe->phone}}</td>
                            </tr>
                            <tr>
                                <th class="fw-bold text-primary">Adresse:</th>
                                <td>{{ $employe->address}}</td>
                            </tr>
                            <tr>
                                <th class="fw-bold text-primary">Ville:</th>
                                <td>{{ $employe->city}}</td>
                            </tr>
                        </table>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.employe.edit', $employe->id)}}" class="btn btn-warning rounded-pill">
                                <i class="fas fa-edit"></i> Modifier
                            </a>

                            <form action="{{ route('admin.employe.destroy', $employe->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-pill">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="alert alert-danger text-center mt-3">❌ Employé introuvable!</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

