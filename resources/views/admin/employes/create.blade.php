@extends('adminlte::page')

@section('title')
    Ajouter un employé | Laravel Employés App
@endsection

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">
            <i class="fas fa-user-plus text-primary"></i>
            Nouvel Employé
        </h1>
        <a href="{{ route('admin.employes.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Retour à la liste
        </a>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    @if(session('message'))
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

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-gradient-primary text-white py-3">
                    <div class="d-flex align-items-center">
                        <div class="avatar-circle bg-white text-primary mr-3">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div>
                            <h4 class="mb-0">Créer un nouvel employé</h4>
                            <small class="opacity-75">Remplissez les informations ci-dessous</small>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <form action="{{ route('admin.employes.store') }}" method="POST" enctype="multipart/form-data" id="employeeForm">
                        @csrf
                        
                        <!-- Personal Information Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-user mr-2"></i>Informations Personnelles
                                </h5>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">
                                        <i class="fas fa-user mr-1"></i>Nom Complet <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control modern-input" name="name" 
                                           placeholder="Entrez le nom complet" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="registration_number" class="form-label">
                                        <i class="fas fa-id-card mr-1"></i>Numéro d'Enregistrement <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control modern-input" name="registration_number" 
                                           placeholder="Ex: EMP001" value="{{ old('registration_number') }}" required>
                                    @error('registration_number')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-address-book mr-2"></i>Informations de Contact
                                </h5>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">
                                        <i class="fas fa-envelope mr-1"></i>Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control modern-input" name="email" 
                                           placeholder="exemple@entreprise.com" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">
                                        <i class="fas fa-phone mr-1"></i>Téléphone <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel" class="form-control modern-input" name="phone" 
                                           placeholder="Format: 23456789" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Address Information Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-map-marker-alt mr-2"></i>Adresse
                                </h5>
                            </div>
                            
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="address" class="form-label">
                                        <i class="fas fa-home mr-1"></i>Adresse <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control modern-input" name="address" 
                                           placeholder="Adresse complète" value="{{ old('address') }}" required>
                                    @error('address')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city" class="form-label">
                                        <i class="fas fa-city mr-1"></i>Ville <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control modern-input" name="city" 
                                           placeholder="Ex: Paris" value="{{ old('city') }}" required>
                                    @error('city')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Employment Information Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-briefcase mr-2"></i>Informations d'Emploi
                                </h5>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="departement" class="form-label">
                                        <i class="fas fa-building mr-1"></i>Département <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-control modern-input" name="departement" required>
                                        <option value="">Sélectionnez un département</option>
                                        @foreach ($departements as $departement)
                                            <option value="{{ $departement->id }}" {{ old('departement') == $departement->id ? 'selected' : '' }}>
                                                {{ $departement->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('departement')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hire_date" class="form-label">
                                        <i class="fas fa-calendar-alt mr-1"></i>Date d'Embauche <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" class="form-control modern-input" name="hire_date" 
                                           value="{{ old('hire_date') }}" required>
                                    @error('hire_date')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Profile Image Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-camera mr-2"></i>Photo de Profil
                                </h5>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="form-label">
                                        <i class="fas fa-image mr-1"></i>Image
                                    </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="imageInput" onchange="previewImage(event)">
                                        <label class="custom-file-label" for="imageInput">Choisir une image</label>
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="image-preview-container text-center">
                                    <img id="imagePreview" src="#" alt="Aperçu de l'image" 
                                         style="display:none; max-width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 3px solid #e9ecef;">
                                </div>
                            </div>
                        </div>

                        <!-- Security Section -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-lock mr-2"></i>Sécurité
                                </h5>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="form-label">
                                        <i class="fas fa-key mr-1"></i>Mot de Passe <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control modern-input" name="password" 
                                               id="password" placeholder="Mot de passe sécurisé" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                                <i class="fas fa-eye" id="passwordToggle"></i>
                                            </button>
                                        </div>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="password-strength mt-4">
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar" id="passwordStrength" role="progressbar" style="width: 0%"></div>
                                    </div>
                                    <small class="text-muted mt-1 d-block">Force du mot de passe</small>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Section -->
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="button" class="btn btn-outline-secondary" onclick="resetForm()">
                                        <i class="fas fa-undo"></i> Réinitialiser
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        <i class="fas fa-save mr-2"></i>Créer l'Employé
                                    </button>
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
    border-radius: 15px;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.card-header {
    border-radius: 15px 15px 0 0 !important;
}

.avatar-circle {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
}

.modern-input {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    padding: 12px 15px;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
}

.modern-input:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    background-color: #fff;
}

.custom-file-input {
    border-radius: 10px;
    border: 2px solid #e9ecef;
    background-color: #f8f9fa;
}

.custom-file-label {
    border-radius: 10px;
    background-color: #f8f9fa;
    border: 2px solid #e9ecef;
    padding: 12px 15px;
}

.form-label {
    font-weight: 600;
    color: #495057;
    margin-bottom: 8px;
}

.btn {
    border-radius: 10px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.15);
}

.bg-gradient-primary {
    background: linear-gradient(45deg, #007bff, #0056b3);
}

.progress {
    border-radius: 10px;
    background-color: #e9ecef;
}

.progress-bar {
    border-radius: 10px;
    transition: width 0.3s ease;
}

.alert {
    border-radius: 10px;
    border: none;
}

.alert-success {
    background: linear-gradient(45deg, #28a745, #20c997);
    color: white;
}

.alert-danger {
    background: linear-gradient(45deg, #dc3545, #c82333);
    color: white;
}

.image-preview-container {
    min-height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
    border-radius: 10px;
    border: 2px dashed #dee2e6;
}

.section-divider {
    border-top: 2px solid #e9ecef;
    margin: 2rem 0;
}
</style>
@endsection

@section('js')
<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');
    const label = document.querySelector('.custom-file-label');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
        label.textContent = input.files[0].name;
    } else {
        preview.src = '#';
        preview.style.display = 'none';
        label.textContent = 'Choisir une image';
    }
}

function togglePassword() {
    const passwordInput = document.getElementById('password');
    const passwordToggle = document.getElementById('passwordToggle');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordToggle.classList.remove('fa-eye');
        passwordToggle.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        passwordToggle.classList.remove('fa-eye-slash');
        passwordToggle.classList.add('fa-eye');
    }
}

function resetForm() {
    if (confirm('Êtes-vous sûr de vouloir réinitialiser le formulaire ?')) {
        document.getElementById('employeeForm').reset();
        document.getElementById('imagePreview').style.display = 'none';
        document.querySelector('.custom-file-label').textContent = 'Choisir une image';
        document.getElementById('passwordStrength').style.width = '0%';
    }
}

// Password strength checker
document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const strengthBar = document.getElementById('passwordStrength');
    let strength = 0;
    
    if (password.length >= 8) strength += 25;
    if (password.match(/[a-z]/)) strength += 25;
    if (password.match(/[A-Z]/)) strength += 25;
    if (password.match(/[0-9]/)) strength += 25;
    
    strengthBar.style.width = strength + '%';
    
    if (strength <= 25) {
        strengthBar.className = 'progress-bar bg-danger';
    } else if (strength <= 50) {
        strengthBar.className = 'progress-bar bg-warning';
    } else if (strength <= 75) {
        strengthBar.className = 'progress-bar bg-info';
    } else {
        strengthBar.className = 'progress-bar bg-success';
    }
});

// Form validation enhancement
document.getElementById('employeeForm').addEventListener('submit', function(e) {
    const requiredFields = this.querySelectorAll('[required]');
    let isValid = true;
    
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });
    
    if (!isValid) {
        e.preventDefault();
        alert('Veuillez remplir tous les champs obligatoires.');
    }
});
</script>
@endsection