<div class="container mt-4">
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                        @if($editingDepartmentId === $departement->id)
                            <div class="d-flex gap-2 align-items-center flex-grow-1 me-2">
                                <input
                                    type="text"
                                    class="form-control form-control-sm @error('editingName') is-invalid @enderror"
                                    wire:model="editingName"
                                    wire:keydown.escape="cancelEdit"
                                    wire:keydown.enter="updateDepartment"
                                >
                                @error('editingName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-success" wire:click="updateDepartment">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button class="btn btn-sm btn-secondary" wire:click="cancelEdit">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @else
                            <span>{{ $departement->name }}</span>
                            <div class="btn-group">
                                <button class="btn btn-sm btn-warning mx-1" wire:click="startEdit({{ $departement->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" wire:click="delete({{ $departement->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        @endif
                    </div>
                @empty
                    <div class="alert alert-warning">Aucun département trouvé.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>


