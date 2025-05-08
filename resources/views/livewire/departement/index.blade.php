<div class="container mt-4">
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
                            <button class="btn btn-sm btn-danger">
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

    <div class="mt-3">
       Pagination
    </div>
</div>

