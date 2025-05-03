<div class="container mt-4">
    <h1 class="mb-4">Liste des Départements</h1>

    <div class="list-group">
        @forelse ($departements as $departement)
            <div class="list-group-item">
                {{ $departement->name }}
            </div>
        @empty
            <div class="alert alert-warning">Aucun département trouvé.</div>
        @endforelse
    </div>

    <div class="mt-3">
       Pagination
    </div>
</div>

