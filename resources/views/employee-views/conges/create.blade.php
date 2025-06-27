@extends('layouts.user')

@section('title')
    Nouvelle Demande de Congé | CongeApp
@endsection

@section('content')
<div class="container-fluid">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-0">
                        <i class="fas fa-calendar-plus text-primary mr-2"></i>
                        Nouvelle Demande de Congé
                    </h2>
                    <p class="text-muted mb-0">Soumettez votre demande de congé</p>
                </div>
                <a href="{{ route('employes.conge.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left mr-1"></i> Retour à mes congés
                </a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-primary text-white border-0 py-3">
                    <div class="d-flex align-items-center">
                        <div class="header-icon mr-3">
                            <i class="fas fa-calendar-plus"></i>
                        </div>
                        <div>
                            <h4 class="mb-0">Formulaire de Demande</h4>
                            <small class="opacity-75">Remplissez les informations ci-dessous</small>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            <strong>Erreurs de validation:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('employes.conge.store') }}" method="POST" enctype="multipart/form-data" id="leaveForm">
                        @csrf

                        <!-- Leave Type Section -->
                        <div class="form-section mb-4">
                            <h5 class="section-title">
                                <i class="fas fa-tag mr-2"></i>Type de Congé
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type" class="form-label">
                                            <i class="fas fa-calendar-alt mr-1"></i>Type de congé <span class="text-danger">*</span>
                                        </label>
                                        <select name="type" id="type" class="form-control modern-select" required>
                                            <option value="">Sélectionnez un type</option>
                                            <option value="Congé annuel" {{ old('type') == 'Congé annuel' ? 'selected' : '' }}>
                                                <i class="fas fa-umbrella-beach"></i> Congé annuel
                                            </option>
                                            <option value="Congé maladie" {{ old('type') == 'Congé maladie' ? 'selected' : '' }}>
                                                <i class="fas fa-heartbeat"></i> Congé maladie
                                            </option>
                                            <option value="Congé maternité" {{ old('type') == 'Congé maternité' ? 'selected' : '' }}>
                                                <i class="fas fa-baby"></i> Congé maternité
                                            </option>
                                            <option value="Congé paternité" {{ old('type') == 'Congé paternité' ? 'selected' : '' }}>
                                                <i class="fas fa-male"></i> Congé paternité
                                            </option>
                                            <option value="Congé exceptionnel" {{ old('type') == 'Congé exceptionnel' ? 'selected' : '' }}>
                                                <i class="fas fa-star"></i> Congé exceptionnel
                                            </option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Date Range Section -->
                        <div class="form-section mb-4">
                            <h5 class="section-title">
                                <i class="fas fa-calendar-day mr-2"></i>Période de Congé
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_debut" class="form-label">
                                            <i class="fas fa-play mr-1"></i>Date de début <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" name="date_debut" id="date_debut" 
                                               class="form-control modern-input" 
                                               value="{{ old('date_debut') }}" 
                                               min="{{ date('Y-m-d') }}" required>
                                        @error('date_debut')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date_fin" class="form-label">
                                            <i class="fas fa-stop mr-1"></i>Date de fin <span class="text-danger">*</span>
                                        </label>
                                        <input type="date" name="date_fin" id="date_fin" 
                                               class="form-control modern-input" 
                                               value="{{ old('date_fin') }}" 
                                               min="{{ date('Y-m-d') }}" required>
                                        @error('date_fin')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="duration-info">
                                        <i class="fas fa-info-circle text-info mr-1"></i>
                                        <span id="durationText">Durée: Sélectionnez les dates</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Document Upload Section -->
                        <div class="form-section mb-4">
                            <h5 class="section-title">
                                <i class="fas fa-file-upload mr-2"></i>Justificatif (Optionnel)
                            </h5>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="justificatif" class="form-label">
                                            <i class="fas fa-file-alt mr-1"></i>Document justificatif
                                        </label>
                                        <div class="file-upload-wrapper">
                                            <input type="file" name="justificatif" id="justificatif" 
                                                   class="form-control modern-file-input" 
                                                   accept=".pdf,.jpg,.jpeg,.png,.doc,.docx">
                                            <div class="file-info">
                                                <small class="text-muted">
                                                    <i class="fas fa-info-circle mr-1"></i>
                                                    Formats acceptés: PDF, JPG, PNG, DOC, DOCX (Max: 5MB)
                                                </small>
                                            </div>
                                        </div>
                                        @error('justificatif')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reason Section -->
                        <div class="form-section mb-4">
                            <h5 class="section-title">
                                <i class="fas fa-comment mr-2"></i>Motif (Optionnel)
                            </h5>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="motif" class="form-label">
                                            <i class="fas fa-edit mr-1"></i>Explication du congé
                                        </label>
                                        <textarea name="motif" id="motif" 
                                                  class="form-control modern-textarea" 
                                                  rows="4" 
                                                  placeholder="Expliquez brièvement la raison de votre demande de congé..."
                                                  maxlength="500">{{ old('motif') }}</textarea>
                                        <div class="character-count">
                                            <small class="text-muted">
                                                <span id="charCount">0</span>/500 caractères
                                            </small>
                                        </div>
                                        @error('motif')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Section -->
                        <div class="form-section">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="confirmCheck" name="confirmation">
                                            <label class="form-check-label" for="confirmCheck">
                                                <i class="fas fa-check-circle mr-1"></i>
                                                Je confirme que les informations fournies sont exactes
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-lg" id="submitBtn" >
                                            <i class="fas fa-paper-plane mr-2"></i>
                                            <span id="submitText">Envoyer la demande</span>
                                            <span id="submitSpinner" class="spinner-border spinner-border-sm ml-2 d-none"></span>
                                        </button>
                                    </div>
                                    <div class="mt-3">
                                        <small class="text-muted" id="validationMessage">
                                            <i class="fas fa-info-circle mr-1"></i>
                                            Pour activer le bouton, veuillez remplir les champs obligatoires et cocher la case de confirmation.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
.card {
    border-radius: 20px;
    overflow: hidden;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.header-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.form-section {
    padding: 1.5rem;
    border-radius: 15px;
    background: #f8f9fa;
    border: 1px solid #e9ecef;
}

.section-title {
    color: #495057;
    font-weight: 600;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #dee2e6;
}

.modern-input, .modern-select, .modern-textarea {
    border: 2px solid #e9ecef;
    border-radius: 10px;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
    background: white;
}

.modern-input:focus, .modern-select:focus, .modern-textarea:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    outline: none;
}

.modern-file-input {
    padding: 0.5rem;
    border: 2px dashed #dee2e6;
    border-radius: 10px;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

.modern-file-input:hover {
    border-color: #667eea;
    background: #f0f2ff;
}

.file-info {
    margin-top: 0.5rem;
}

.duration-info {
    padding: 0.75rem;
    background: #e3f2fd;
    border-radius: 8px;
    border-left: 4px solid #2196f3;
}

.character-count {
    text-align: right;
    margin-top: 0.5rem;
}

.btn {
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
    padding: 0.75rem 2rem;
}

.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
    transform: none;
}

.btn-primary {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    color: white;
}

.btn-primary:hover:not(:disabled) {
    background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
    transform: translateY(-2px);
    box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.15);
}

.btn-secondary {
    background: #6c757d;
    border: none;
    color: white;
}

.form-check-input:checked {
    background-color: #667eea;
    border-color: #667eea;
}

.form-check-label.text-success {
    color: #28a745 !important;
    font-weight: 600;
}

.alert {
    border-radius: 15px;
    border: none;
}

.alert-success {
    background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
    color: #155724;
}

.alert-danger {
    background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
    color: #721c24;
}

.form-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 0.5rem;
}

.text-danger {
    color: #dc3545 !important;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}
</style>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateDebut = document.getElementById('date_debut');
    const dateFin = document.getElementById('date_fin');
    const durationText = document.getElementById('durationText');
    const motif = document.getElementById('motif');
    const charCount = document.getElementById('charCount');
    const confirmCheck = document.getElementById('confirmCheck');
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const submitSpinner = document.getElementById('submitSpinner');
    const typeSelect = document.getElementById('type');

    // Calculate duration
    function calculateDuration() {
        if (dateDebut.value && dateFin.value) {
            const start = new Date(dateDebut.value);
            const end = new Date(dateFin.value);
            const diffTime = Math.abs(end - start);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
            
            if (end < start) {
                durationText.innerHTML = '<i class="fas fa-exclamation-triangle text-warning mr-1"></i>Date de fin doit être après la date de début';
                durationText.className = 'text-warning';
            } else {
                durationText.innerHTML = `<i class="fas fa-calendar-day text-info mr-1"></i>Durée: ${diffDays} jour(s)`;
                durationText.className = 'text-info';
            }
        } else {
            durationText.innerHTML = '<i class="fas fa-info-circle text-info mr-1"></i>Durée: Sélectionnez les dates';
            durationText.className = 'text-info';
        }
    }

    // Character count for motif
    function updateCharCount() {
        const count = motif.value.length;
        charCount.textContent = count;
        if (count > 450) {
            charCount.className = 'text-warning';
        } else {
            charCount.className = 'text-muted';
        }
    }

    // Enable/disable submit button - Simplified validation
    function updateSubmitButton() {
        const hasDates = dateDebut.value && dateFin.value;
        const hasType = typeSelect.value && typeSelect.value.trim() !== '';
        const isConfirmed = confirmCheck.checked;
        const validationMessage = document.getElementById('validationMessage');
        
        // Check if dates are valid (end date after start date)
        let datesValid = false;
        if (hasDates) {
            const start = new Date(dateDebut.value);
            const end = new Date(dateFin.value);
            datesValid = end >= start;
        }
        
        // Enable button if we have type, valid dates and confirmation
        const shouldEnable = hasType && hasDates && datesValid && isConfirmed;
        
        submitBtn.disabled = !shouldEnable;
        
        // Update button appearance
        if (shouldEnable) {
            submitBtn.classList.remove('btn-secondary');
            submitBtn.classList.add('btn-primary');
            validationMessage.innerHTML = '<i class="fas fa-check-circle text-success mr-1"></i>Formulaire complet ! Vous pouvez envoyer votre demande.';
            validationMessage.className = 'text-success';
        } else {
            submitBtn.classList.remove('btn-primary');
            submitBtn.classList.add('btn-secondary');
            
            // Provide specific feedback
            if (!hasType) {
                validationMessage.innerHTML = '<i class="fas fa-info-circle text-info mr-1"></i>Veuillez sélectionner un type de congé.';
                validationMessage.className = 'text-info';
            } else if (!hasDates) {
                validationMessage.innerHTML = '<i class="fas fa-info-circle text-info mr-1"></i>Veuillez sélectionner les dates de début et de fin.';
                validationMessage.className = 'text-info';
            } else if (!datesValid) {
                validationMessage.innerHTML = '<i class="fas fa-exclamation-triangle text-warning mr-1"></i>La date de fin doit être après la date de début.';
                validationMessage.className = 'text-warning';
            } else if (!isConfirmed) {
                validationMessage.innerHTML = '<i class="fas fa-info-circle text-info mr-1"></i>Veuillez confirmer que les informations sont exactes.';
                validationMessage.className = 'text-info';
            } else {
                validationMessage.innerHTML = '<i class="fas fa-info-circle text-info mr-1"></i>Veuillez remplir tous les champs obligatoires.';
                validationMessage.className = 'text-info';
            }
        }
        
        // Debug info (remove in production)
        console.log('Validation:', {
            hasType: hasType,
            hasDates: hasDates,
            datesValid: datesValid,
            isConfirmed: isConfirmed,
            shouldEnable: shouldEnable
        });
    }

    // Event listeners
    dateDebut.addEventListener('change', function() {
        if (this.value) {
            dateFin.min = this.value;
        }
        calculateDuration();
        updateSubmitButton();
    });

    dateFin.addEventListener('change', function() {
        calculateDuration();
        updateSubmitButton();
    });

    typeSelect.addEventListener('change', function() {
        updateSubmitButton();
    });

    confirmCheck.addEventListener('change', function() {
        if (this.checked) {
            this.parentElement.classList.add('text-success');
        } else {
            this.parentElement.classList.remove('text-success');
        }
        updateSubmitButton();
    });

    motif.addEventListener('input', updateCharCount);

    // Form submission
    document.getElementById('leaveForm').addEventListener('submit', function(e) {
        // Final validation before submission
        const hasDates = dateDebut.value && dateFin.value;
        const hasType = typeSelect.value && typeSelect.value.trim() !== '';
        const isConfirmed = confirmCheck.checked;
        
        if (!hasDates || !hasType || !isConfirmed) {
            e.preventDefault();
            alert('Veuillez remplir tous les champs obligatoires et confirmer les informations.');
            return;
        }
        
        // Check date validity
        const start = new Date(dateDebut.value);
        const end = new Date(dateFin.value);
        if (end < start) {
            e.preventDefault();
            alert('La date de fin doit être après la date de début.');
            return;
        }
        
        // Show loading state
        submitBtn.disabled = true;
        submitText.textContent = 'Envoi en cours...';
        submitSpinner.classList.remove('d-none');
    });

    // Initialize
    calculateDuration();
    updateCharCount();
    updateSubmitButton();
});
</script>
@endsection

