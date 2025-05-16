<div class="card-body p-4">
                    @if(session()->has('message'))
                        <div class="alert alert-success text-center">{{ session('message')}}</div>
                    @endif

                    <form wire:submit.prevent="store" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-primary">Type:</label>
                                <select wire:model="type" class="form-select">
                                    <option value="">Select type</option>
                                    <option value="vacances">🏖 Vacances</option>
                                    <option value="maladie">🤕 Maladie</option>
                                    <option value="télétravail">💻 Télétravail</option>
                                </select>
                                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-primary">Date début:</label>
                                <input type="date" wire:model="date_debut"  class="form-control" required>
                                @error('date_debut') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-primary">Date fin:</label>
                                <input type="date" wire:model="date_fin" class="form-control" required>
                                @error('date_fin') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-primary">Justificatif:</label>
                                <input type="file" wire:model="justificatif" class="form-control">
                                <small class="text-muted">Formats acceptés: PDF, JPG, PNG</small>
                                @error('justificatif') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold text-primary">Motif (optionnel):</label>
                                <textarea wire:model="motif" class="form-control" rows="2" placeholder="Expliquez brièvement..." style="resize: none;"></textarea>
                               @error('motif')
                                   <span class="text-danger">{{ $message }}</span>
                               @enderror
                            </div>
                        </div>
                         <div class="text-center">
                            <span wire:loading wire:target="store" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-3 rounded-pill">
                            <i class="fas fa-paper-plane"></i> Envoyer
                        </button>
                    </form>
                </div>
