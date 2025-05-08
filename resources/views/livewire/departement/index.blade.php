<div class="container mt-4">
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" data-toggle="alert" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h1 class="mb-4">Liste des Départements</h1>

    <div class="card">
        <div class="card-body">
            <div class="list-group">
                @forelse ($departements as $departement)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $departement->name }}</span>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-warning mx-1">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirm('Êtes-vous sûr de vouloir supprimer ce département ?') || event.stopImmediatePropagation()" wire:click="delete({{ $departement->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning">Aucun département trouvé.</div>
                @endforelse
            </div>
        </div>
    </div>

    
</div>


