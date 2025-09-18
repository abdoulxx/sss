@extends('layouts.dashboard-ultra')

@section('title', 'Modifier WebTV')
@section('page-title', 'Modifier WebTV')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/webtv.css') }}">
    <style>
        /* Variables CSS pour la cohérence */
        :root {
            --ea-gold: #F2CB05;
            --ea-blue: #2563eb;
            --ea-green: #10b981;
            --ea-danger: #dc3545;
            --live-red: #ff3333;
            --program-purple: #8b5cf6;
            --edit-orange: #f59e0b;
            --card-bg: #ffffff;
            --card-border: #e9ecef;
            --text-primary: #2c3e50;
            --text-secondary: #6c757d;
            --shadow-light: 0 2px 10px rgba(0,0,0,0.08);
            --shadow-hover: 0 4px 20px rgba(0,0,0,0.12);
        }

        /* Layout principal */
        .modern-webtv-edit-section {
            background: #f8f9fa;
            min-height: 100vh;
        }

        /* Header avec indicateur Edit */
        .page-header-modern {
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow-light);
            padding: 2rem;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            border-left: 4px solid var(--edit-orange);
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-main {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--edit-orange), #fbbf24);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .page-subtitle {
            color: var(--text-secondary);
            margin: 0.5rem 0 0 0;
            font-size: 1rem;
        }

        .breadcrumb-modern {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
            font-size: 0.9rem;
        }

        .breadcrumb-item {
            color: var(--text-secondary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .breadcrumb-item:hover {
            color: var(--ea-gold);
        }

        .breadcrumb-item.active {
            color: var(--text-primary);
            font-weight: 500;
        }

        .breadcrumb-separator {
            color: #dee2e6;
            font-size: 0.8rem;
        }

        /* Status indicator selon le type */
        .status-indicator {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .status-live {
            background: rgba(255, 51, 51, 0.1);
            color: var(--live-red);
            border: 1px solid rgba(255, 51, 51, 0.3);
        }

        .status-scheduled {
            background: rgba(255, 193, 7, 0.1);
            color: #856404;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }

        .status-archived {
            background: rgba(108, 117, 125, 0.1);
            color: var(--text-secondary);
            border: 1px solid rgba(108, 117, 125, 0.3);
        }

        .status-draft {
            background: rgba(139, 92, 246, 0.1);
            color: var(--program-purple);
            border: 1px solid rgba(139, 92, 246, 0.3);
        }

        /* Form styling spécifique à l'édition */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            padding: 2rem;
        }

        .form-section {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .section-header {
            border-bottom: 2px solid #f1f3f4;
            padding-bottom: 1rem;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--edit-orange);
            margin: 0;
        }

        .section-description {
            color: var(--text-secondary);
            margin: 0.5rem 0 0 0;
            font-size: 0.9rem;
        }

        /* Type selection styling */
        .type-selector {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 1rem;
        }

        .type-option {
            position: relative;
        }

        .type-radio {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        .type-label {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .type-radio:checked + .type-label {
            border-color: var(--ea-gold);
            background: rgba(242, 203, 5, 0.05);
        }

        .type-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
        }

        .type-option:nth-child(1) .type-icon {
            background: linear-gradient(135deg, var(--live-red), #ff6666);
        }

        .type-option:nth-child(2) .type-icon {
            background: linear-gradient(135deg, var(--program-purple), #a78bfa);
        }

        .type-content h4 {
            margin: 0 0 0.25rem 0;
            font-weight: 600;
            color: var(--text-primary);
        }

        .type-content p {
            margin: 0;
            font-size: 0.85rem;
            color: var(--text-secondary);
        }

        /* Conditional fields styling */
        .conditional-fields {
            transition: all 0.3s ease;
        }

        /* Info panel styling */
        .info-panel {
            padding: 1.5rem;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 8px;
            border: 1px solid #dee2e6;
            margin-top: 1rem;
        }

        .info-panel h4 {
            margin: 0 0 1rem 0;
            color: var(--text-primary);
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem;
            background: white;
            border-radius: 6px;
            font-size: 0.85rem;
        }

        .info-item label {
            font-weight: 500;
            color: var(--text-secondary);
        }

        .info-item span {
            color: var(--text-primary);
            font-family: monospace;
            word-break: break-all;
        }

        /* Boutons spécifiques edit */
        .btn-primary-modern {
            background: linear-gradient(135deg, var(--ea-gold), #e6b800);
            color: #000;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary-modern:hover:not(:disabled) {
            background: linear-gradient(135deg, #e6b800, #d4ac00);
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
            color: #000;
            text-decoration: none;
        }

        .btn-secondary-modern, .btn-outline-modern {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-secondary-modern {
            background: #6c757d;
            color: white;
        }

        .btn-secondary-modern:hover:not(:disabled) {
            background: #5a6268;
            transform: translateY(-1px);
            color: white;
            text-decoration: none;
        }

        .btn-outline-modern {
            background: transparent;
            color: var(--text-secondary);
            border-color: var(--text-secondary);
        }

        .btn-outline-modern:hover {
            background: var(--text-secondary);
            color: white;
            text-decoration: none;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                padding: 1rem;
            }

            .type-selector {
                grid-template-columns: 1fr;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .page-header-modern {
                flex-direction: column;
                text-align: center;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.3s ease;
        }
    </style>
@endpush

@section('content')
<div class="modern-webtv-edit-section">
    <!-- Enhanced Header -->
    <div class="page-header-modern">
        <div class="header-content">
            <div class="header-main">
                <div class="header-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="header-info">
                    <h1 class="page-title">Modifier WebTV</h1>
                    <p class="page-subtitle">{{ $webtv->titre }}</p>
                    <div class="breadcrumb-modern">
                        <a href="{{ url('/') }}" class="breadcrumb-item">
                            <i class="fas fa-home"></i>
                            Dashboard
                        </a>
                        <i class="fas fa-chevron-right breadcrumb-separator"></i>
                        <a href="{{ route('dashboard.webtv.index') }}" class="breadcrumb-item">WebTV</a>
                        <i class="fas fa-chevron-right breadcrumb-separator"></i>
                        <span class="breadcrumb-item active">Modifier</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-actions">
            <div class="status-indicator status-{{ $webtv->statut_couleur }}">
                @if($webtv->statut === 'en_direct')
                    <div class="live-dot"></div>
                @endif
                <span>{{ $webtv->statut_formatte }}</span>
            </div>
            <a href="{{ route('dashboard.webtv.index') }}" class="btn-secondary-modern">
                <i class="fas fa-arrow-left"></i>
                <span>Retour</span>
            </a>
        </div>
    </div>

    <!-- Form Container -->
    <div class="form-container-modern">
        <form id="webtv-form" action="{{ route('dashboard.webtv.update', $webtv) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">
                <!-- Type Selection -->
                <div class="form-section">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fas fa-layer-group"></i>
                            Type de Contenu
                        </h3>
                        <p class="section-description">Sélectionnez le type de contenu WebTV</p>
                    </div>

                    <div class="form-fields">
                        <div class="form-field">
                            <label class="form-label required">Type de Programme</label>
                            <div class="type-selector">
                                <div class="type-option">
                                    <input type="radio"
                                           id="type_live"
                                           name="type_programme"
                                           value="live"
                                           class="type-radio"
                                           {{ old('type_programme', $webtv->type_programme) === 'live' ? 'checked' : '' }}>
                                    <label for="type_live" class="type-label">
                                        <div class="type-icon">
                                            <i class="fas fa-broadcast-tower"></i>
                                        </div>
                                        <div class="type-content">
                                            <h4>Live Stream</h4>
                                            <p>Diffusion en direct avec embed Vimeo</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="type-option">
                                    <input type="radio"
                                           id="type_programme"
                                           name="type_programme"
                                           value="programme"
                                           class="type-radio"
                                           {{ old('type_programme', $webtv->type_programme) === 'programme' ? 'checked' : '' }}>
                                    <label for="type_programme" class="type-label">
                                        <div class="type-icon">
                                            <i class="fas fa-video"></i>
                                        </div>
                                        <div class="type-content">
                                            <h4>Programme</h4>
                                            <p>Vidéo enregistrée avec intégration Vimeo</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations Principales -->
                <div class="form-section">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fas fa-info-circle"></i>
                            Informations Principales
                        </h3>
                        <p class="section-description">Détails de votre contenu WebTV</p>
                    </div>

                    <div class="form-fields">
                        <div class="form-field">
                            <label for="titre" class="form-label required">Titre</label>
                            <input type="text"
                                   id="titre"
                                   name="titre"
                                   class="form-input @error('titre') error @enderror"
                                   placeholder="Ex: Débat Économique - Excellence Afrik"
                                   value="{{ old('titre', $webtv->titre) }}"
                                   maxlength="255"
                                   required>
                            @error('titre')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <div class="field-help">Titre visible sur la page WebTV (max 255 caractères)</div>
                        </div>

                        <div class="form-field">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description"
                                      name="description"
                                      class="form-textarea @error('description') error @enderror"
                                      placeholder="Description détaillée de votre contenu..."
                                      rows="4"
                                      maxlength="1000">{{ old('description', $webtv->description) }}</textarea>
                            @error('description')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <div class="field-help">Description optionnelle du contenu (max 1000 caractères)</div>
                        </div>

                        <!-- Champs spécifiques au type Programme -->
                        <div id="programme-fields" class="conditional-fields" style="{{ old('type_programme', $webtv->type_programme) === 'programme' ? 'display: block;' : 'display: none;' }}">
                            <div class="form-field">
                                <label for="categorie" class="form-label required">Catégorie</label>
                                <select id="categorie" name="categorie" class="form-select @error('categorie') error @enderror">
                                    <option value="">Sélectionnez une catégorie</option>
                                    <option value="debates" {{ old('categorie', $webtv->categorie) === 'debates' ? 'selected' : '' }}>Débats</option>
                                    <option value="interviews" {{ old('categorie', $webtv->categorie) === 'interviews' ? 'selected' : '' }}>Interviews</option>
                                    <option value="reportages" {{ old('categorie', $webtv->categorie) === 'reportages' ? 'selected' : '' }}>Reportages</option>
                                    <option value="documentaires" {{ old('categorie', $webtv->categorie) === 'documentaires' ? 'selected' : '' }}>Documentaires</option>
                                    <option value="general" {{ old('categorie', $webtv->categorie) === 'general' ? 'selected' : '' }}>Général</option>
                                </select>
                                @error('categorie')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Champs spécifiques au type Live -->
                        <div id="live-fields" class="conditional-fields" style="{{ old('type_programme', $webtv->type_programme) === 'live' ? 'display: block;' : 'display: none;' }}">
                            <div class="form-field">
                                <label for="date_programmee" class="form-label">Date de Programmation</label>
                                <input type="datetime-local"
                                       id="date_programmee"
                                       name="date_programmee"
                                       class="form-input @error('date_programmee') error @enderror"
                                       value="{{ old('date_programmee', $webtv->date_programmee ? $webtv->date_programmee->format('Y-m-d\TH:i') : '') }}">
                                @error('date_programmee')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <div class="field-help">Optionnel - Laissez vide pour un live immédiat</div>
                            </div>
                        </div>

                        <div class="form-field">
                            <label for="duree_estimee" class="form-label">Durée Estimée</label>
                            <div class="duration-input">
                                <input type="number"
                                       id="duree_estimee"
                                       name="duree_estimee"
                                       class="form-input @error('duree_estimee') error @enderror"
                                       placeholder="90"
                                       value="{{ old('duree_estimee', $webtv->duree_estimee) }}"
                                       min="1"
                                       max="600">
                                <span class="duration-unit">minutes</span>
                            </div>
                            @error('duree_estimee')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <div class="field-help">Durée approximative du contenu (1-600 minutes)</div>
                        </div>

                        <div class="form-field">
                            <label for="statut" class="form-label required">Statut</label>
                            <select id="statut" name="statut" class="form-select @error('statut') error @enderror" required>
                                <option value="draft" {{ old('statut', $webtv->statut) === 'draft' ? 'selected' : '' }}>Brouillon</option>
                                <option value="programme" {{ old('statut', $webtv->statut) === 'programme' ? 'selected' : '' }}>Publié/Programmé</option>
                                <option value="en_direct" {{ old('statut', $webtv->statut) === 'en_direct' ? 'selected' : '' }}>En Direct</option>
                                <option value="termine" {{ old('statut', $webtv->statut) === 'termine' ? 'selected' : '' }}>Terminé</option>
                            </select>
                            @error('statut')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                            <div class="field-help">
                                Statut actuel du contenu
                                @if($webtv->statut === 'en_direct')
                                    <strong style="color: #28a745;"> - Actuellement EN DIRECT</strong>
                                @endif
                            </div>
                        </div>

                        <div class="form-field">
                            <div class="checkbox-field">
                                <input type="hidden" name="est_actif" value="0">
                                <input type="checkbox"
                                       id="est_actif"
                                       name="est_actif"
                                       value="1"
                                       class="form-checkbox"
                                       {{ old('est_actif', $webtv->est_actif) ? 'checked' : '' }}>
                                <label for="est_actif" class="checkbox-label">
                                    Actif sur la page WebTV
                                    @if($webtv->est_actif)
                                        <span style="color: #28a745; font-weight: 600;"> - Actuellement ACTIF</span>
                                    @endif
                                </label>
                            </div>
                            <div class="field-help">Si coché, ce contenu sera visible côté client</div>
                        </div>

                        <!-- Informations supplémentaires -->
                        <div class="info-panel">
                            <h4>Informations Système</h4>
                            <div class="info-grid">
                                <div class="info-item">
                                    <label>Type:</label>
                                    <span>{{ $webtv->type_programme === 'live' ? 'Live Stream' : 'Programme' }}</span>
                                </div>
                                <div class="info-item">
                                    <label>ID Vidéo:</label>
                                    <span>{{ $webtv->video_id ?? ($webtv->vimeo_event_id ?? 'Non détecté') }}</span>
                                </div>
                                <div class="info-item">
                                    <label>Créé le:</label>
                                    <span>{{ $webtv->created_at->format('d/m/Y à H:i') }}</span>
                                </div>
                                <div class="info-item">
                                    <label>Dernière modification:</label>
                                    <span>{{ $webtv->updated_at->format('d/m/Y à H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Code Embed Vimeo -->
                <div class="form-section">
                    <div class="section-header">
                        <h3 class="section-title">
                            <i class="fab fa-vimeo-v"></i>
                            Code Vimeo
                        </h3>
                        <p class="section-description">Code d'intégration Vimeo selon le type de contenu</p>
                    </div>

                    <div class="form-fields">
                        <!-- Code pour Programme -->
                        <div id="code-programme" class="conditional-fields" style="{{ old('type_programme', $webtv->type_programme) === 'programme' ? 'display: block;' : 'display: none;' }}">
                            <div class="form-field">
                                <label for="code_integration_vimeo" class="form-label required">Code d'Intégration Vimeo</label>
                                <textarea id="code_integration_vimeo"
                                          name="code_integration_vimeo"
                                          class="form-textarea code-textarea @error('code_integration_vimeo') error @enderror"
                                          placeholder='<iframe src="https://vimeo.com/video/123456789/embed" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>'
                                          rows="4">{{ old('code_integration_vimeo', $webtv->code_integration_vimeo) }}</textarea>
                                @error('code_integration_vimeo')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <div class="field-help">Code iframe d'intégration depuis Vimeo (requis pour les programmes)</div>
                            </div>
                        </div>

                        <!-- Code pour Live -->
                        <div id="code-live" class="conditional-fields" style="{{ old('type_programme', $webtv->type_programme) === 'live' ? 'display: block;' : 'display: none;' }}">
                            <div class="form-field">
                                <label for="code_embed_vimeo" class="form-label required">Code Embed Live</label>
                                <textarea id="code_embed_vimeo"
                                          name="code_embed_vimeo"
                                          class="form-textarea code-textarea @error('code_embed_vimeo') error @enderror"
                                          placeholder='<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://vimeo.com/event/5339809/embed/interaction" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; encrypted-media; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>'
                                          rows="6">{{ old('code_embed_vimeo', $webtv->code_embed_vimeo) }}</textarea>
                                @error('code_embed_vimeo')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                                <div class="field-help">Code embed complet depuis Vimeo Live (requis pour les lives)</div>
                            </div>
                        </div>

                        <!-- Preview -->
                        <div class="form-field">
                            <div class="preview-actions">
                                <button type="button" id="preview-btn" class="btn-secondary-modern">
                                    <i class="fas fa-eye"></i>
                                    <span>Prévisualiser</span>
                                </button>
                            </div>

                            <div id="embed-preview" class="embed-preview" style="display: none;">
                                <h4>Aperçu</h4>
                                <div class="preview-container">
                                    <div id="preview-content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <div class="actions-left">
                    <button type="button" id="reset-btn" class="btn-outline-modern">
                        <i class="fas fa-undo"></i>
                        <span>Réinitialiser</span>
                    </button>
                </div>
                <div class="actions-right">
                    <a href="{{ route('dashboard.webtv.show', $webtv) }}" class="btn-outline-modern">
                        <i class="fas fa-eye"></i>
                        <span>Voir</span>
                    </a>
                    <a href="{{ route('dashboard.webtv.index') }}" class="btn-outline-modern">
                        <i class="fas fa-times"></i>
                        <span>Annuler</span>
                    </a>
                    <button type="submit" class="btn-primary-modern" id="submit-btn">
                        <i class="fas fa-save"></i>
                        <span>Sauvegarder</span>
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
    const typeRadios = document.querySelectorAll('input[name="type_programme"]');
    const programmeFields = document.getElementById('programme-fields');
    const liveFields = document.getElementById('live-fields');
    const codeProgramme = document.getElementById('code-programme');
    const codeLive = document.getElementById('code-live');
    const previewBtn = document.getElementById('preview-btn');
    const previewContainer = document.getElementById('embed-preview');
    const previewContent = document.getElementById('preview-content');
    const resetBtn = document.getElementById('reset-btn');

    // Type selection handling
    typeRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            const selectedType = this.value;

            if (selectedType === 'programme') {
                programmeFields.style.display = 'block';
                liveFields.style.display = 'none';
                codeProgramme.style.display = 'block';
                codeLive.style.display = 'none';

                // Make programme fields required
                document.getElementById('categorie').required = true;
                document.getElementById('code_integration_vimeo').required = true;
                document.getElementById('code_embed_vimeo').required = false;
            } else {
                programmeFields.style.display = 'none';
                liveFields.style.display = 'block';
                codeProgramme.style.display = 'none';
                codeLive.style.display = 'block';

                // Make live fields required
                document.getElementById('categorie').required = false;
                document.getElementById('code_integration_vimeo').required = false;
                document.getElementById('code_embed_vimeo').required = true;
            }

            // Clear preview
            previewContainer.style.display = 'none';
            previewContent.innerHTML = '';
        });
    });

    // Preview functionality
    previewBtn.addEventListener('click', function() {
        const selectedType = document.querySelector('input[name="type_programme"]:checked')?.value;
        let code = '';

        if (selectedType === 'programme') {
            code = document.getElementById('code_integration_vimeo').value.trim();
        } else {
            code = document.getElementById('code_embed_vimeo').value.trim();
        }

        if (code) {
            validateAndPreview(code);
        } else {
            alert('Veuillez saisir un code avant de prévisualiser.');
        }
    });

    // Reset button
    resetBtn.addEventListener('click', function() {
        if (confirm('Êtes-vous sûr de vouloir réinitialiser le formulaire ? Toutes les modifications non sauvegardées seront perdues.')) {
            window.location.reload();
        }
    });

    function validateAndPreview(code) {
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
                showPreview(code);
            } else {
                alert('Code embed invalide: ' + (data.message || 'Format non reconnu'));
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            // Show preview anyway for basic validation
            if (code.includes('vimeo.com')) {
                showPreview(code);
            } else {
                alert('Code embed invalide - doit contenir une URL Vimeo');
            }
        });
    }

    function showPreview(code) {
        previewContent.innerHTML = code;
        previewContainer.style.display = 'block';
        previewContainer.classList.add('fade-in');

        // Scroll to preview
        previewContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    // Form validation
    document.getElementById('webtv-form').addEventListener('submit', function(e) {
        const titre = document.getElementById('titre').value.trim();
        const selectedType = document.querySelector('input[name="type_programme"]:checked')?.value;

        if (!titre) {
            e.preventDefault();
            alert('Le titre est obligatoire.');
            return false;
        }

        if (!selectedType) {
            e.preventDefault();
            alert('Veuillez sélectionner un type de programme.');
            return false;
        }

        if (selectedType === 'programme') {
            const categorie = document.getElementById('categorie').value;
            const code = document.getElementById('code_integration_vimeo').value.trim();

            if (!categorie) {
                e.preventDefault();
                alert('La catégorie est obligatoire pour les programmes.');
                return false;
            }

            if (!code) {
                e.preventDefault();
                alert('Le code d\'intégration Vimeo est obligatoire pour les programmes.');
                return false;
            }
        } else {
            const code = document.getElementById('code_embed_vimeo').value.trim();

            if (!code) {
                e.preventDefault();
                alert('Le code embed Vimeo est obligatoire pour les lives.');
                return false;
            }
        }
    });

    // Character counters
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

    createCharCounter(document.getElementById('titre'), 255);
    createCharCounter(document.getElementById('description'), 1000);

    // Auto-resize textareas
    document.querySelectorAll('.code-textarea').forEach(textarea => {
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    });

    // Initialize form state
    const currentType = document.querySelector('input[name="type_programme"]:checked');
    if (currentType) {
        currentType.dispatchEvent(new Event('change'));
    }
});
</script>
@endsection