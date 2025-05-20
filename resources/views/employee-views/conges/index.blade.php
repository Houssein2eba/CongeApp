@extends('layouts.user')

@section('content')

<div class="container-fluid">
    <div class="w-100"><x-toast :message="session('success')" type="success" />
    <x-toast :message="session('error')" type="danger" /></div>
    <h2 class="my-4">Liste des Congés</h2>
    @extends('layouts.alert')



    <div class="table-responsive shadow-lg">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
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
                <tr>
                    
                    <td>{{ $conge->type }}</td>
                    <td>{{ $conge->date_debut }}</td>
                    <td>{{ $conge->date_fin }}</td>
                    <td>
                        <span class="badge badge-{{
                            $conge->statut == 'Approuve' ? 'success' :
                            ($conge->statut == 'Refuser' ? 'danger' : 'warning') }}">
                            {{ $conge->statut }}
                        </span>
                    </td>
                    <td>{{ $conge->motif ?? '-' }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
