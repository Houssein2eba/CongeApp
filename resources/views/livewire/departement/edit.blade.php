<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit Department</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    
    <form wire:submit.prevent="update">
        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="form-label">Department Name <span class="text-danger">*</span></label>
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    wire:model="name"
                    placeholder="Enter department name"
                >
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">
                <span wire:loading wire:target="update" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Update Department
            </button>
        </div>
    </form>
</div>