@extends('layouts.user')

@section('content')

<div class="container-fluid">
    <div class="w-100"><x-toast :message="session('success')" type="success" />
    <x-toast :message="session('error')" type="danger" /></div>
    <h2 class="my-4">Liste des Congés</h2>
    @extends('layouts.alert')



    <div class="table-responsive shadow-lg">
        <table class="table table-striped table-hover">
            <thead class="bg-primary text-white">
                <tr>

                    <th>Type</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Statut</th>
                    <th>Motif</th>

                </tr>
            </thead>
            <tbody>
                @foreach($conges as $conge)
                <tr class="align-middle ">
                    <td><i class="fas fa-calendar-alt text-primary"></i> {{ $conge->type}}</td>
                    <td><i class="fas fa-clock text-success"></i> {{ $conge->date_debut}}</td>
                    <td><i class="fas fa-clock text-danger"></i> {{ $conge->date_fin}}</td>
                    <td>
                        <span class="badge bg-{{
                            $conge->statut == 'Approuve'? 'success':
                            ($conge->statut == 'Refuser'? 'danger': 'warning')}}">
                            <i class="fas fa-{{
                                $conge->statut == 'Approuve'? 'check-circle':
                                ($conge->statut == 'Refuser'? 'times-circle': 'hourglass-half')}}"></i>
                            {{ $conge->statut}}
                        </span>
                    </td>
                    <td class="fw-bold text-secondary">{{ $conge->motif?? '-'}}</td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>
@endsection
