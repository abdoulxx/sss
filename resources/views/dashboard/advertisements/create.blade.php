@extends('layouts.dashboard-ultra')

@section('title', 'Créer une Publicité')

@section('content')
<div class="dashboard-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-plus me-2"></i>
                            Créer une Nouvelle Publicité
                        </h5>
                    </div>
                    <div class="card-body">
                        <!-- Étapes du formulaire -->
                        <div class="mb-4">
                            <div class="progress" style="height: 4px;">
                                <div class="progress-bar" role="progressbar" style="width: 33.33%" id="formProgress"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4 text-center">
                                    <div class="step-indicator active" id="step1-indicator">
                                        <div class="step-circle">1</div>
                                        <small>Informations de base</small>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="step-indicator" id="step2-indicator">
                                        <div class="step-circle">2</div>
                                        <small>Ciblage</small>
                                    </div>
                                </div>
                                <div class="col-4 text-center">
                                    <div class="step-indicator" id="step3-indicator">
                                        <div class="step-circle">3</div>
                                        <small>Position & Planning</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('dashboard.advertisements.store') }}" method="POST" enctype="multipart/form-data" id="advertisementForm" novalidate>
                            @csrf
                            
                            <!-- Étape 1: Informations de base -->
                            <div class="form-step" id="step1">
                                <h6 class="mb-3">Étape 1: Informations de base</h6>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Titre de la publicité *</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                                   id="title" name="title" value="{{ old('title') }}" required>
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="url" class="form-label">URL de destination *</label>
                                            <input type="url" class="form-control @error('url') is-invalid @enderror" 
                                                   id="url" name="url" value="{{ old('url') }}" required
                                                   placeholder="https://example.com">
                                            @error('url')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text">Cette URL sera utilisée pour le tracking des clics</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image de la publicité *</label>
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                                   id="image" name="image" accept="image/*" required>
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text">JPG, PNG ou GIF. L'image sera automatiquement redimensionnée.</div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="priority" class="form-label">Priorité</label>
                                            <select class="form-select" id="priority" name="priority">
                                                <option value="1" {{ old('priority') == 1 ? 'selected' : '' }}>1 - Faible</option>
                                                <option value="5" {{ old('priority', 5) == 5 ? 'selected' : '' }}>5 - Normale</option>
                                                <option value="10" {{ old('priority') == 10 ? 'selected' : '' }}>10 - Élevée</option>
                                            </select>
                                            <div class="form-text">Plus la priorité est élevée, plus la publicité sera affichée en premier</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary" onclick="nextStep(2)">
                                        Suivant <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Étape 2: Ciblage -->
                            <div class="form-step d-none" id="step2">
                                <h6 class="mb-3">Étape 2: Où afficher cette publicité ?</h6>
                                
                                <div class="mb-3">
                                    <label for="page_type" class="form-label">Type de page *</label>
                                    <select class="form-select @error('page_type') is-invalid @enderror"
                                            id="page_type" name="page_type" required>
                                        <option value="">Sélectionnez le type de page...</option>
                                        <option value="home" {{ old('page_type') == 'home' ? 'selected' : '' }}>Page d'accueil</option>
                                        <option value="article" {{ old('page_type') == 'article' ? 'selected' : '' }}>Pages d'articles</option>
                                        <option value="webtv" {{ old('page_type') == 'webtv' ? 'selected' : '' }}>Pages WebTV</option>
                                    </select>
                                    @error('page_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" onclick="prevStep(1)">
                                        <i class="fas fa-arrow-left me-2"></i> Précédent
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="nextStep(3)">
                                        Suivant <i class="fas fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Étape 3: Position & Planning -->
                            <div class="form-step d-none" id="step3">
                                <h6 class="mb-3">Étape 3: Position et planification</h6>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="position_in_page" class="form-label">Position sur la page *</label>
                                            <select class="form-select @error('position_in_page') is-invalid @enderror"
                                                    id="position_in_page" name="position_in_page" required>
                                                <option value="">Sélectionnez la position...</option>
                                                <!-- Options pour la page d'accueil -->
                                                <option value="home_top_banner" data-page="home" {{ old('position_in_page') == 'home_top_banner' ? 'selected' : '' }}>
                                                    Accueil - Bannière haute - 785×193px
                                                </option>
                                                <option value="home_middle_section" data-page="home" {{ old('position_in_page') == 'home_middle_section' ? 'selected' : '' }}>
                                                    Accueil - Entre articles et portraits - 1166×247px
                                                </option>
                                                <!-- Option pour les pages d'articles -->
                                                <option value="article_sidebar" data-page="article" {{ old('position_in_page') == 'article_sidebar' ? 'selected' : '' }}>
                                                    Article - Sidebar - 401×613px
                                                </option>
                                                <!-- Option pour les pages WebTV -->
                                                <option value="webtv_before_footer" data-page="webtv" {{ old('position_in_page') == 'webtv_before_footer' ? 'selected' : '' }}>
                                                    WebTV - Avant footer - 1166×247px
                                                </option>
                                            </select>
                                            @error('position_in_page')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <div class="form-text">L'image sera automatiquement redimensionnée selon la position choisie</div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <!-- Aperçu des dimensions -->
                                        <div class="mb-3">
                                            <label class="form-label">Aperçu de la taille</label>
                                            <div class="position-preview d-none" id="position_preview">
                                                <div class="preview-box" id="preview_box">
                                                    <span id="preview_text">Sélectionnez une position</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="start_date" class="form-label">Date de début *</label>
                                            <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" 
                                                   id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                                            @error('start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="end_date" class="form-label">Date de fin *</label>
                                            <input type="datetime-local" class="form-control @error('end_date') is-invalid @enderror" 
                                                   id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                                            @error('end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" onclick="prevStep(2)">
                                        <i class="fas fa-arrow-left me-2"></i> Précédent
                                    </button>
                                    <button type="submit" class="btn btn-success" onclick="return validateAllSteps()">
                                        <i class="fas fa-save me-2"></i> Créer la publicité
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.step-indicator {
    display: flex;
    flex-direction: column;
    align-items: center;
    opacity: 0.5;
    transition: opacity 0.3s;
}

.step-indicator.active {
    opacity: 1;
}

.step-indicator.completed {
    opacity: 1;
    color: #28a745;
}

.step-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #e9ecef;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    margin-bottom: 8px;
    transition: all 0.3s;
}

.step-indicator.active .step-circle {
    background-color: #007bff;
    color: white;
}

.step-indicator.completed .step-circle {
    background-color: #28a745;
    color: white;
}

.position-preview {
    border: 2px dashed #dee2e6;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    min-height: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.preview-box {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    padding: 10px;
    font-size: 12px;
    color: #6c757d;
    transition: all 0.3s;
}

/* Aperçus des différentes tailles */
.preview-top-banner {
    width: 200px;
    height: 25px;
}

.preview-sidebar {
    width: 120px;
    height: 100px;
}

.preview-middle {
    width: 200px;
    height: 25px;
}

.preview-bottom {
    width: 200px;
    height: 52px;
}
</style>
@endpush

@push('scripts')
<script>
let currentStep = 1;

function nextStep(step) {
    if (validateStep(currentStep)) {
        document.getElementById('step' + currentStep).classList.add('d-none');
        document.getElementById('step' + currentStep + '-indicator').classList.remove('active');
        document.getElementById('step' + currentStep + '-indicator').classList.add('completed');
        
        currentStep = step;
        
        document.getElementById('step' + currentStep).classList.remove('d-none');
        document.getElementById('step' + currentStep + '-indicator').classList.add('active');
        
        updateProgress();
    }
}

function prevStep(step) {
    document.getElementById('step' + currentStep).classList.add('d-none');
    document.getElementById('step' + currentStep + '-indicator').classList.remove('active');
    
    currentStep = step;
    
    document.getElementById('step' + currentStep).classList.remove('d-none');
    document.getElementById('step' + currentStep + '-indicator').classList.add('active');
    document.getElementById('step' + currentStep + '-indicator').classList.remove('completed');
    
    updateProgress();
}

function updateProgress() {
    const progress = (currentStep / 3) * 100;
    document.getElementById('formProgress').style.width = progress + '%';
}

function validateStep(step) {
    let isValid = true;
    let missingFields = [];
    
    if (step === 1) {
        const title = document.getElementById('title').value.trim();
        const url = document.getElementById('url').value.trim();
        const image = document.getElementById('image').files.length;
        
        if (!title) missingFields.push('Titre');
        if (!url) missingFields.push('URL');
        if (image === 0) missingFields.push('Image');
        
        // Validation de l'URL
        if (url && !isValidUrl(url)) {
            alert('Veuillez entrer une URL valide (ex: https://example.com)');
            return false;
        }
        
        if (missingFields.length > 0) {
            alert('Veuillez remplir les champs suivants: ' + missingFields.join(', '));
            isValid = false;
        }
    } else if (step === 2) {
        const pageType = document.getElementById('page_type').value;
        
        if (!pageType) {
            alert('Veuillez sélectionner un type de page');
            isValid = false;
        }
    } else if (step === 3) {
        const position = document.getElementById('position_in_page').value;
        const startDate = document.getElementById('start_date').value;
        const endDate = document.getElementById('end_date').value;
        
        if (!position) missingFields.push('Position sur la page');
        if (!startDate) missingFields.push('Date de début');
        if (!endDate) missingFields.push('Date de fin');
        
        if (missingFields.length > 0) {
            alert('Veuillez remplir les champs suivants: ' + missingFields.join(', '));
            isValid = false;
        }
        
        // Validation des dates
        if (startDate && endDate && new Date(startDate) >= new Date(endDate)) {
            alert('La date de fin doit être après la date de début');
            isValid = false;
        }
    }
    
    return isValid;
}

function isValidUrl(string) {
    try {
        new URL(string);
        return true;
    } catch (_) {
        return false;
    }
}

function validateAllSteps() {
    console.log('Validating all steps before submission...');
    
    // Valider toutes les étapes
    if (!validateStep(1)) {
        alert('Veuillez corriger les erreurs dans l\'étape 1 (Informations de base)');
        return false;
    }
    
    if (!validateStep(2)) {
        alert('Veuillez corriger les erreurs dans l\'étape 2 (Ciblage)');
        return false;
    }
    
    if (!validateStep(3)) {
        alert('Veuillez corriger les erreurs dans l\'étape 3 (Position & Planning)');
        return false;
    }
    
    console.log('All steps validated successfully');
    return true;
}

// Gestion du changement de type de page
document.getElementById('page_type').addEventListener('change', function() {
    const pageType = this.value;
    const positionSelect = document.getElementById('position_in_page');

    // Filtrer les options de position selon le type de page
    const allOptions = positionSelect.querySelectorAll('option[data-page]');
    allOptions.forEach(option => {
        if (pageType && option.dataset.page === pageType) {
            option.style.display = 'block';
        } else {
            option.style.display = 'none';
        }
    });

    // Réinitialiser la sélection de position
    positionSelect.value = '';
    document.getElementById('position_preview').classList.add('d-none');
});


// Gestion de l'aperçu de position
document.getElementById('position_in_page').addEventListener('change', function() {
    const position = this.value;
    const preview = document.getElementById('position_preview');
    const previewBox = document.getElementById('preview_box');
    const previewText = document.getElementById('preview_text');
    
    if (position) {
        preview.classList.remove('d-none');
        previewBox.className = 'preview-box preview-' + position.replace('_', '-');
        
        const dimensions = {
            'home_top_banner': '785×193px',
            'home_middle_section': '1166×247px',
            'article_sidebar': '401×613px',
            'webtv_before_footer': '1166×247px'
        };
        
        previewText.textContent = dimensions[position] || 'Aperçu';
    } else {
        preview.classList.add('d-none');
    }
});


// Définir les dates par défaut
document.addEventListener('DOMContentLoaded', function() {
    const now = new Date();
    const tomorrow = new Date(now);
    tomorrow.setDate(tomorrow.getDate() + 1);
    const nextMonth = new Date(now);
    nextMonth.setMonth(nextMonth.getMonth() + 1);
    
    const formatDate = (date) => {
        return date.getFullYear() + '-' + 
               String(date.getMonth() + 1).padStart(2, '0') + '-' + 
               String(date.getDate()).padStart(2, '0') + 'T' + 
               String(date.getHours()).padStart(2, '0') + ':' + 
               String(date.getMinutes()).padStart(2, '0');
    };
    
    if (!document.getElementById('start_date').value) {
        document.getElementById('start_date').value = formatDate(tomorrow);
    }
    if (!document.getElementById('end_date').value) {
        document.getElementById('end_date').value = formatDate(nextMonth);
    }
});
</script>
@endpush