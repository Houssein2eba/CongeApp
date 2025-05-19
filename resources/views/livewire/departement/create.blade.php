<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Nouveau departement</h5>
    </div>

    <div class="card-body">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form wire:submit.prevent="store">
            <div class="mb-3">
                <label for="name" class="form-label"> <span class="text-danger">*</span></label>
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    wire:model="name"
                    placeholder="Enter department name"
                >
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">
                    <span wire:loading wire:target="store" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Creer
                </button>
            </div>
        </form>
    </div>
</div>
