@extends('layouts.dashboard-ultra')

@section('title', $type === 'live' ? 'Nouveau Live' : 'Nouveau Programme')
@section('page-title', $type === 'live' ? 'Nouveau Live' : 'Nouveau Programme')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/webtv.css') }}">
@endpush

@section('content')
<div class="modern-webtv-create-section">
    <!-- Enhanced Header -->
    <div class="page-header-modern">
        <div class="header-content">
            <div class="header-main">
                <div class="header-icon">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <div class="header-info">
                    <h1 class="page-title">{{ $type === 'live' ? 'Nouveau Live' : 'Nouveau Programme' }}</h1>
                    <p class="page-subtitle">{{ $type === 'live' ? 'Créez un nouveau live Vimeo pour votre audience' : 'Ajoutez un programme vidéo à votre catalogue' }}</p>
                    <div class="breadcrumb-modern">
                        <a href="{{ url('/') }}" class="breadcrumb-item">
                            <i class="fas fa-home"></i>
                            Dashboard
                        </a>
                        <i class="fas fa-chevron-right breadcrumb-separator"></i>
                        <a href="{{ route('dashboard.webtv.index') }}" class="breadcrumb-item">WebTV</a>
                        <i class="fas fa-chevron-right breadcrumb-separator"></i>
                        <span class="breadcrumb-item active">Nouveau</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('dashboard.webtv.index') }}" class="btn-secondary-modern">
                <i class="fas fa-arrow-left"></i>
                <span>Retour</span>
            </a>
        </div>
    </div>

    <!-- Form Container -->
    <div class="form-container-modern">
        <form id="webtv-form" action="{{ route('dashboard.webtv.store') }}" method="POST">
            @csrf
            <input type="hidden" name="type_programme" value="{{ $type }}">

            <div class="form-grid">
                <!-- Informations Principales -->
                <div class="form-section">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fas fa-info-circle"></i>
                            {{ $type === 'live' ? 'Informations du Live' : 'Informations du Programme' }}
                        </h3>
                        <p class="section-description">{{ $type === 'live' ? 'Renseignez les détails de votre diffusion en direct' : 'Renseignez les détails de votre programme vidéo' }}</p>
                    </div>

                    <div class="form-fields">
                        <div class="form-field">
                            <label for="titre" class="form-label required">{{ $type === 'live' ? 'Titre du Live' : 'Titre du Programme' }}</label>
                            <input type="text"
                                   id="titre"
                                   name="titre"
                                   class="form-input @error('titre') error @enderror"
                                   placeholder="{{ $type === 'live' ? 'Ex: Débat Économique - Excellence Afrik' : 'Ex: Portrait d\'Entrepreneur - Innovation Tech' }}"
                                   value="{{ old('titre') }}"
                                   maxlength="255"
                                   required>
                            @error('titre')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <div class="field-help">Titre visible sur la page WebTV (max 255 caractères)</div>
                        </div>

                        @if($type === 'programme')
                        <div class="form-field">
                            <label for="categorie" class="form-label required">Catégorie</label>
                            <select id="categorie" name="categorie" class="form-select @error('categorie') error @enderror" required>
                                <option value="">Sélectionnez une catégorie</option>
                                <option value="debates" {{ old('categorie') === 'debates' ? 'selected' : '' }}>Débats</option>
                                <option value="interviews" {{ old('categorie') === 'interviews' ? 'selected' : '' }}>Interviews</option>
                                <option value="reportages" {{ old('categorie') === 'reportages' ? 'selected' : '' }}>Reportages</option>
                                <option value="documentaires" {{ old('categorie') === 'documentaires' ? 'selected' : '' }}>Documentaires</option>
                                <option value="general" {{ old('categorie') === 'general' ? 'selected' : '' }}>Général</option>
                            </select>
                            @error('categorie')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <div class="field-help">Catégorie du programme pour le filtrage</div>
                        </div>
                        @endif

                        <div class="form-field">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description"
                                      name="description"
                                      class="form-textarea @error('description') error @enderror"
                                      placeholder="Description détaillée de votre live..."
                                      rows="4"
                                      maxlength="1000">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <div class="field-help">Description optionnelle du contenu (max 1000 caractères)</div>
                        </div>

                        @if($type === 'live')
                        <div class="form-field">
                            <label for="date_programmee" class="form-label">Date de Programmation</label>
                            <input type="datetime-local"
                                   id="date_programmee"
                                   name="date_programmee"
                                   class="form-input @error('date_programmee') error @enderror"
                                   value="{{ old('date_programmee') }}"
                                   min="{{ now()->format('Y-m-d\TH:i') }}">
                            @error('date_programmee')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <div class="field-help">Optionnel - Laissez vide pour un live immédiat</div>
                        </div>
                        @endif

                        <div class="form-field">
                            <label for="duree_estimee" class="form-label">Durée Estimée</label>
                            <div class="duration-input">
                                <input type="number"
                                       id="duree_estimee"
                                       name="duree_estimee"
                                       class="form-input @error('duree_estimee') error @enderror"
                                       placeholder="90"
                                       value="{{ old('duree_estimee') }}"
                                       min="1"
                                       max="600">
                                <span class="duration-unit">minutes</span>
                            </div>
                            @error('duree_estimee')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <div class="field-help">Durée approximative de votre live (1-600 minutes)</div>
                        </div>

                        <div class="form-field">
                            <label for="statut" class="form-label required">Statut Initial</label>
                            <select id="statut" name="statut" class="form-select @error('statut') error @enderror" required>
                                @if($type === 'live')
                                    <option value="draft" {{ old('statut') === 'draft' ? 'selected' : '' }}>🔒 Brouillon (non visible côté client)</option>
                                    <option value="programme" {{ old('statut', 'programme') === 'programme' ? 'selected' : '' }}>✅ Programmé (visible côté client)</option>
                                    <option value="en_direct" {{ old('statut') === 'en_direct' ? 'selected' : '' }}>🔴 En Direct (visible côté client)</option>
                                @else
                                    <option value="draft" {{ old('statut') === 'draft' ? 'selected' : '' }}>🔒 Brouillon (non visible côté client)</option>
                                    <option value="programme" {{ old('statut', 'programme') === 'programme' ? 'selected' : '' }}>✅ Publié (visible côté client)</option>
                                    <option value="termine" {{ old('statut') === 'termine' ? 'selected' : '' }}>📁 Archivé (visible côté client)</option>
                                @endif
                            </select>
                            @error('statut')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <div class="field-help">{{ $type === 'live' ? 'Statut de publication du live' : 'Statut de publication du programme' }}</div>
                        </div>

                        <div class="form-field">
                            <div class="checkbox-field">
                                <input type="hidden" name="est_actif" value="0">
                                <input type="checkbox"
                                       id="est_actif"
                                       name="est_actif"
                                       value="1"
                                       class="form-checkbox"
                                       {{ old('est_actif', 1) ? 'checked' : '' }}>
                                <label for="est_actif" class="checkbox-label">
                                    {{ $type === 'live' ? 'Activer immédiatement sur la page WebTV' : 'Visible sur la page WebTV' }}
                                </label>
                            </div>
                            <div class="field-help">{{ $type === 'live' ? 'Si coché, ce live sera visible côté client' : 'Si coché, ce programme sera visible dans les "Programmes Récents"' }}</div>
                        </div>
                    </div>
                </div>

                @if($type === 'live')
                <!-- Code Embed Vimeo Live -->
                <div class="form-section">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fas fa-broadcast-tower"></i>
                            Code Embed Live Vimeo
                        </h3>
                        <p class="section-description">Collez le code d'intégration de votre live Vimeo</p>
                    </div>

                    <div class="form-fields">
                        <div class="form-field">
                            <label for="code_embed_vimeo" class="form-label required">Code d'Intégration Live</label>
                            <textarea id="code_embed_vimeo"
                                      name="code_embed_vimeo"
                                      class="form-textarea code-textarea @error('code_embed_vimeo') error @enderror"
                                      placeholder='<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://vimeo.com/event/5339809/embed/interaction" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; encrypted-media; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>'
                                      rows="6"
                                      {{ $type === 'live' ? 'required' : '' }}>{{ old('code_embed_vimeo') }}</textarea>
                            @error('code_embed_vimeo')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <div class="field-help">
                                <div class="help-steps">
                                    <strong>Comment obtenir ce code :</strong>
                                    <ol>
                                        <li>Connectez-vous à votre compte Vimeo</li>
                                        <li>Créez votre événement live</li>
                                        <li>Allez dans l'onglet "Embed"</li>
                                        <li>Copiez le code complet et collez-le ici</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                @else
                <!-- Code d'Intégration Vimeo Programme -->
                <div class="form-section">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fab fa-vimeo-v"></i>
                            Code d'Intégration Vidéo Vimeo
                        </h3>
                        <p class="section-description">Collez le code d'intégration de votre vidéo Vimeo</p>
                    </div>

                    <div class="form-fields">
                        <div class="form-field">
                            <label for="code_integration_vimeo" class="form-label required">Code d'Intégration Vidéo</label>
                            <textarea id="code_integration_vimeo"
                                      name="code_integration_vimeo"
                                      class="form-textarea code-textarea @error('code_integration_vimeo') error @enderror"
                                      placeholder='<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/1104807208?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479&amp;autoplay=1&amp;muted=1&amp;loop=1" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share" referrerpolicy="strict-origin-when-cross-origin" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Titre de la vidéo"></iframe></div>'
                                      rows="6"
                                      required>{{ old('code_integration_vimeo') }}</textarea>
                            @error('code_integration_vimeo')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <div class="field-help">
                                <div class="help-steps">
                                    <strong>Comment obtenir ce code :</strong>
                                    <ol>
                                        <li>Uploadez votre vidéo sur Vimeo</li>
                                        <li>Allez sur la page de votre vidéo</li>
                                        <li>Cliquez sur le bouton "Partager"</li>
                                        <li>Copiez le code d'intégration complet</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                @endif

                        <!-- Informations extraites -->
                        <div id="embed-info" class="embed-info" style="display: none;">
                            <h4>Informations Détectées</h4>
                            <div class="info-grid">
                                <div class="info-item">
                                    <label>URL Vimeo:</label>
                                    <span id="detected-url">-</span>
                                </div>
                                <div class="info-item">
                                    <label>ID Événement:</label>
                                    <span id="detected-id">-</span>
                                </div>
                            </div>
                        </div>

                        <!-- Preview -->
                        <div id="embed-preview" class="embed-preview" style="display: none;">
                            <h4>Aperçu du Player</h4>
                            <div class="preview-container">
                                <div id="preview-content"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <div class="actions-left">
                    <button type="button" id="preview-btn" class="btn-secondary-modern" disabled>
                        <i class="fas fa-eye"></i>
                        <span>Prévisualiser</span>
                    </button>
                </div>
                <div class="actions-right">
                    <a href="{{ route('dashboard.webtv.index') }}" class="btn-outline-modern">
                        <i class="fas fa-times"></i>
                        <span>Annuler</span>
                    </a>
                    <button type="submit" class="btn-primary-modern" id="submit-btn" disabled>
                        <i class="fas fa-save"></i>
                        <span>{{ $type === 'live' ? 'Créer le Live' : 'Créer le Programme' }}</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/pages/webtv.css') }}">
@endpush

<script>
document.addEventListener('DOMContentLoaded', function() {
    const type = '{{ $type }}';
    const codeTextarea = type === 'live'
        ? document.getElementById('code_embed_vimeo')
        : document.getElementById('code_integration_vimeo');
    const embedInfo = document.getElementById('embed-info');
    const embedPreview = document.getElementById('embed-preview');
    const previewBtn = document.getElementById('preview-btn');
    const submitBtn = document.getElementById('submit-btn');
    const previewContent = document.getElementById('preview-content');
    const detectedUrl = document.getElementById('detected-url');
    const detectedId = document.getElementById('detected-id');

    let currentEmbedCode = '';
    let validationTimeout;

    // Pour les programmes, activer les boutons par défaut
    if (type === 'programme') {
        enableActions();
    }

    // Validation en temps réel du code embed
    if (codeTextarea) {
        codeTextarea.addEventListener('input', function() {
            clearTimeout(validationTimeout);
            const code = this.value.trim();

            if (code) {
                if (type === 'programme') {
                    // Validation immédiate pour les programmes
                    validateEmbedCode(code);
                } else {
                    // Validation avec délai pour les lives
                    validationTimeout = setTimeout(() => {
                        validateEmbedCode(code);
                    }, 500);
                }
            } else {
                if (type === 'live') {
                    resetValidation();
                }
            }
        });
    }

    // Bouton de prévisualisation
    previewBtn.addEventListener('click', function() {
        showPreview();
    });

    function validateEmbedCode(code) {
        if (type === 'programme') {
            // Pour les programmes, validation simple du code d'intégration
            if (code.includes('vimeo.com/video/') && code.includes('iframe')) {
                // Extraction de l'ID vidéo pour les programmes
                const match = code.match(/vimeo\.com\/video\/(\d+)/);
                const videoId = match ? match[1] : null;

                showEmbedInfo({
                    valide: true,
                    url_vimeo: match ? `https://vimeo.com/${videoId}` : 'Détecté',
                    event_id: videoId || 'Détecté',
                    code_embed: code
                });
                enableActions();
                currentEmbedCode = code;
            } else {
                showError('Code d\'intégration Vimeo invalide. Vérifiez qu\'il contient bien un iframe Vimeo.');
                resetValidation();
            }
        } else {
            // Pour les lives, utiliser l'API existante
            fetch('{{ route("dashboard.webtv.preview-embed") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ code_embed: code })
            })
            .then(response => response.json())
            .then(data => {
                if (data.valide) {
                    showEmbedInfo(data);
                    enableActions();
                    currentEmbedCode = code;
                } else {
                    showError(data.message || 'Code embed invalide');
                    resetValidation();
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                showError('Erreur lors de la validation');
                resetValidation();
            });
        }
    }

    function showEmbedInfo(data) {
        detectedUrl.textContent = data.url_vimeo || 'Non détecté';
        detectedId.textContent = data.event_id || 'Non détecté';

        embedInfo.style.display = 'block';
        embedInfo.classList.add('fade-in');

        // Ajouter indicateur de succès au textarea
        codeTextarea.classList.remove('error');
        codeTextarea.style.borderColor = '#28a745';
    }

    function showPreview() {
        if (currentEmbedCode) {
            previewContent.innerHTML = currentEmbedCode;
            embedPreview.style.display = 'block';
            embedPreview.classList.add('fade-in');

            // Scroll vers la preview
            embedPreview.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    }

    function enableActions() {
        previewBtn.disabled = false;
        submitBtn.disabled = false;
    }

    function resetValidation() {
        embedInfo.style.display = 'none';
        embedPreview.style.display = 'none';
        previewBtn.disabled = true;
        submitBtn.disabled = true;
        codeTextarea.style.borderColor = '';
        currentEmbedCode = '';
    }

    function showError(message) {
        codeTextarea.classList.add('error');

        // Créer ou mettre à jour le message d'erreur
        let errorSpan = codeTextarea.parentElement.querySelector('.error-message');
        if (!errorSpan) {
            errorSpan = document.createElement('span');
            errorSpan.className = 'error-message';
            codeTextarea.parentElement.appendChild(errorSpan);
        }
        errorSpan.textContent = message;
    }

    // Validation initiale si du contenu existe déjà
    if (codeTextarea.value.trim()) {
        validateEmbedCode(codeTextarea.value.trim());
    }

    // Validation du formulaire avant soumission
    document.getElementById('webtv-form').addEventListener('submit', function(e) {
        const titre = document.getElementById('titre').value.trim();
        const code = codeTextarea.value.trim();
        const categorieRequired = type === 'programme';
        const categorie = categorieRequired ? document.getElementById('categorie').value : null;

        if (!titre || !code) {
            e.preventDefault();
            alert('Veuillez remplir tous les champs obligatoires.');
            return false;
        }

        if (categorieRequired && !categorie) {
            e.preventDefault();
            alert('Veuillez sélectionner une catégorie pour le programme.');
            return false;
        }

        if (type === 'live' && !currentEmbedCode) {
            e.preventDefault();
            alert('Veuillez vérifier le code embed du live.');
            return false;
        }
    });

    // Auto-resize du textarea
    codeTextarea.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    // Compteur de caractères pour le titre
    const titreInput = document.getElementById('titre');
    const createCharCounter = (input, maxLength) => {
        const counter = document.createElement('div');
        counter.className = 'char-counter';
        counter.style.cssText = 'font-size: 0.8rem; color: #6c757d; text-align: right; margin-top: 0.25rem;';
        input.parentElement.appendChild(counter);

        const updateCounter = () => {
            const current = input.value.length;
            counter.textContent = `${current}/${maxLength}`;
            counter.style.color = current > maxLength * 0.9 ? '#dc3545' : '#6c757d';
        };

        input.addEventListener('input', updateCounter);
        updateCounter();
    };

    createCharCounter(titreInput, 255);
    createCharCounter(document.getElementById('description'), 1000);
});
</script>
@endsection