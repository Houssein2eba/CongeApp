@extends('layouts.user')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4>📝 Ajouter un Employé</h4>
                </div>
                <div class="card-body p-4">
                    @include('layouts.alert')

                    <form wire:submit.prevent="store">
                        <table class="table table-bordered">
                            <tr>
                                <th class="fw-bold text-primary">N° d’enregistrement:</th>
                                <td>
                                    <input type="text" wire:model.defer="registration_number" class="form-control" placeholder="Ex: EMP12345" required>
                                    @error('registration_number') <span class="text-danger">{{ $message}}</span> @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="fw-bold text-primary">Nom Complet:</th>
                                <td>
                                    <input type="text" wire:model.defer="name" class="form-control" placeholder="Nom complet" required>
                                    @error('name') <span class="text-danger">{{ $message}}</span> @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="fw-bold text-primary">Département:</th>
                                <td>
                                    <select wire:model.defer="departement" class="form-control" required>
                                        <option value="">Sélectionnez un département</option>
                                        @foreach($departements as $departement)
                                            <option value="{{ $departement->id}}">{{ $departement->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('departement') <span class="text-danger">{{ $message}}</span> @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="fw-bold text-primary">Date d’embauche:</th>
                                <td>
                                    <input type="date" wire:model.defer="hire_date" class="form-control" required>
                                    @error('hire_date') <span class="text-danger">{{ $message}}</span> @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="fw-bold text-primary">Email:</th>
                                <td>
                                    <input type="email" wire:model.defer="email" class="form-control" placeholder="Email professionnel" required>
                                    @error('email') <span class="text-danger">{{ $message}}</span> @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="fw-bold text-primary">Téléphone:</th>
                                <td<input type="text" wire:model.defer="phone" class="form-control" placeholder="Format: 23456789" required>
                        @error('phone') <span class="text-danger">{{ $message}}</span> @enderror
                    </td>
                </tr>
                <tr>
                    <th class="fw-bold text-primary">Adresse:</th>
                    <td>
                        <input type="text" wire:model.defer="address" class="form-control" placeholder="Adresse complète" required>
                        @error('address') <span class="text-danger">{{ $message}}</span> @enderror
                    </td>
                </tr>
                <tr>
                    <th class="fw-bold text-primary">Ville:</th>
                    <td>
                        <input type="text" wire:model.defer="city" class="form-control" placeholder="Ex: Paris" required>
                        @error('city') <span class="text-danger">{{ $message}}</span> @enderror
                    </td>
                </tr>
                <tr>
                    <th class="fw-bold text-primary">Photo de Profil:</th>
                    <td>
                        <input type="file" wire:model="image" class="form-control">
                        @error('image') <span class="text-danger">{{ $message}}</span> @enderror

                        @if ($image)
                            <img src="{{ $image->temporaryUrl()}}" class="img-fluid mt-2" style="max-width: 150px; border-radius: 10px;">
                        @endif
                    </td>
                </tr>
            </table>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success rounded-pill px-4">
                    <i class="fas fa-plus"></i> Créer Employé
                </button>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
@endsection
