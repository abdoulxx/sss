@extends('layouts.dashboard-ultra')

@section('title', 'Gestion WebTV')
@section('page-title', 'Gestion WebTV')

@push('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/webtv.css') }}">
    <style>
        /* Variables CSS pour la cohérence */
        :root {
            --ea-gold: #F2CB05;
            --ea-blue: #2563eb;
            --ea-green: #10b981;
            --ea-danger: #dc3545;
            --card-bg: #ffffff;
            --card-border: #e9ecef;
            --text-primary: #2c3e50;
            --text-secondary: #6c757d;
            --shadow-light: 0 2px 10px rgba(0,0,0,0.08);
            --shadow-hover: 0 4px 20px rgba(0,0,0,0.12);
        }

        /* Layout principal */
        .modern-webtv-section {
            background: #f8f9fa;
            min-height: 100vh;
        }

        /* Header amélioré */
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
        }

        .header-content {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--ea-gold), var(--ea-blue));
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
            margin: 0.25rem 0 0 0;
        }

        .breadcrumb-modern {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin-top: 0.5rem;
        }

        .breadcrumb-item {
            color: var(--text-secondary);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--ea-gold);
            font-weight: 600;
        }

        /* Boutons d'actions du header */
        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

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

        .btn-primary-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
            color: #000;
            text-decoration: none;
        }

        .btn-secondary-modern {
            background: var(--ea-blue);
            color: white;
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

        .btn-secondary-modern:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
            background: #1d4ed8;
            color: white;
            text-decoration: none;
        }

        /* Toolbar simplifié */
        .webtv-toolbar {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: var(--shadow-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .search-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border: 2px solid var(--card-border);
            border-radius: 8px;
            background: #f8f9fa;
            min-width: 300px;
        }

        .search-input {
            background: transparent;
            border: none;
            outline: none;
            color: var(--text-primary);
            width: 100%;
        }

        .search-input::placeholder {
            color: var(--text-secondary);
        }

        .toolbar-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .filter-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border: 2px solid var(--card-border);
            border-radius: 8px;
            background: #f8f9fa;
        }

        .filter-select {
            background: transparent;
            border: none;
            outline: none;
            color: var(--text-primary);
            cursor: pointer;
        }

        /* Messages d'alerte */
        .alert-modern {
            padding: 1rem 1.5rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .alert-modern.success {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: var(--ea-green);
        }

        .webtv-preview {
            height: 300px;
            width: 100%;
        }

        .embed-preview, .embed-container-preview, .embed-container-preview iframe {
            height: 100%;
            width: 100%;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-header-modern {
                flex-direction: column;
                text-align: center;
            }

            .header-actions {
                width: 100%;
                justify-content: center;
            }

            .search-group {
                min-width: 100%;
            }
        }
    </style>
@endpush

@section('content')
<div class="modern-webtv-section">
    @php
        // Ensure collection methods like where()/count() work even if $webtvs is a Paginator
        $webtvItems = $webtvs instanceof \Illuminate\Pagination\AbstractPaginator
            ? $webtvs->getCollection()
            : $webtvs;
    @endphp
    <!-- Enhanced Header -->
    <div class="page-header-modern">
        <div class="header-content">
            <div class="header-main">
                <div class="header-icon">
                    <i class="fas fa-tv"></i>
                </div>
                <div class="header-info">
                    <h1 class="page-title">Gestion WebTV</h1>
                    <p class="page-subtitle">Gérez vos lives Vimeo et diffusions en direct</p>
                    <div class="breadcrumb-modern">
                        <a href="{{ url('/') }}" class="breadcrumb-item">
                            <i class="fas fa-home"></i>
                            Dashboard
                        </a>
                        <i class="fas fa-chevron-right breadcrumb-separator"></i>
                        <span class="breadcrumb-item active">WebTV</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-actions">
            <a href="{{ route('dashboard.webtv.media.create') }}" class="btn-primary-modern main-btn">
                <i class="fas fa-broadcast-tower"></i>
                <span>Nouveau Live</span>
            </a>
            <a href="{{ route('dashboard.webtv.programs.create') }}" class="btn-secondary-modern">
                <i class="fas fa-video"></i>
                <span>Nouveau Programme</span>
            </a>
        </div>
    </div>

    @if(session('status'))
    <div class="alert-modern success" role="alert" style="margin-top:12px">
        <i class="fas fa-check-circle"></i>
        <span>{{ session('status') }}</span>
    </div>
    @endif

    <!-- Toolbar simplifié -->
    <div class="webtv-toolbar">
        <div class="search-group">
            <i class="fas fa-search"></i>
            <input type="text" class="search-input" placeholder="Rechercher un live ou programme..." />
        </div>
        <div class="toolbar-actions">
            <div class="filter-item">
                <i class="fas fa-filter"></i>
                <select class="filter-select" aria-label="Filtrer par statut">
                    <option value="all" selected>Tous les statuts</option>
                    <option value="en_direct">En direct</option>
                    <option value="programme">Programmé</option>
                    <option value="draft">Brouillon</option>
                    <option value="termine">Terminé</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Status Cards -->
    <div class="webtv-status-cards">
        <div class="status-card live-card">
            <div class="status-icon">
                <i class="fas fa-circle status-dot"></i>
                <i class="fas fa-broadcast-tower"></i>
            </div>
            <div class="status-info">
                <div class="status-value">{{ $webtvItems->where('statut', 'en_direct')->where('est_actif', true)->count() }}</div>
                <div class="status-label">En Direct</div>
            </div>
        </div>
        <div class="status-card scheduled-card">
            <div class="status-icon">
                <i class="fas fa-clock"></i>
            </div>
            <div class="status-info">
                <div class="status-value">{{ $webtvItems->where('statut', 'programme')->count() }}</div>
                <div class="status-label">Programmés</div>
            </div>
        </div>
        <div class="status-card draft-card">
            <div class="status-icon">
                <i class="fas fa-edit"></i>
            </div>
            <div class="status-info">
                <div class="status-value">{{ $webtvItems->where('statut', 'draft')->count() }}</div>
                <div class="status-label">Brouillons</div>
            </div>
        </div>
        <div class="status-card archived-card">
            <div class="status-icon">
                <i class="fas fa-archive"></i>
            </div>
            <div class="status-info">
                <div class="status-value">{{ $webtvItems->where('statut', 'termine')->count() }}</div>
                <div class="status-label">Terminés</div>
            </div>
        </div>
    </div>

    <!-- WebTV List -->
    <div class="webtv-list-modern">
        @forelse($webtvs as $webtv)
        <div class="webtv-card-modern" style="display: grid; grid-template-columns: 500px 1fr; gap: 2rem; min-height: 320px;">
            <div class="webtv-preview">
                <!-- Status Badge -->
                <div class="status-badge status-{{ $webtv->statut_couleur }}">
                    @if($webtv->statut === 'en_direct')
                        <div class="live-dot"></div>
                    @endif
                    <span>{{ $webtv->statut_formatte }}</span>
                </div>

                <!-- Vimeo Embed Preview -->
                @if($webtv->vimeo_event_id || $webtv->video_id)
                <div class="embed-preview">
                    <div class="embed-container-preview">
                        @if($webtv->type_programme === 'live' && $webtv->code_embed_vimeo)
                            {!! $webtv->code_embed_vimeo !!}
                        @elseif($webtv->type_programme === 'programme' && $webtv->code_integration_vimeo)
                            {!! $webtv->code_integration_vimeo !!}
                        @endif
                        @if($webtv->statut === 'en_direct')
                            <div class="live-badge">
                                <span class="live-dot"></span>
                                EN DIRECT
                            </div>
                        @endif
                    </div>
                    <div class="preview-overlay">
                        <div class="vimeo-info">
                            <i class="fab fa-vimeo-v"></i>
                            @if($webtv->type_programme === 'live' && $webtv->vimeo_event_id)
                                <span>Event ID: {{ $webtv->vimeo_event_id }}</span>
                            @elseif($webtv->type_programme === 'programme' && $webtv->video_id)
                                <span>Video ID: {{ $webtv->video_id }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @else
                <div class="no-preview">
                    <i class="fas fa-tv"></i>
                    <span>Aperçu non disponible</span>
                </div>
                @endif

                <!-- Hidden embed source for modal playback -->
                <div id="embed-src-{{ $webtv->id }}" class="embed-source" style="display:none">
                    @if($webtv->type_programme === 'live' && $webtv->code_embed_vimeo)
                        {!! $webtv->code_embed_vimeo !!}
                    @elseif($webtv->type_programme === 'programme' && $webtv->code_integration_vimeo)
                        {!! $webtv->code_integration_vimeo !!}
                    @elseif($webtv->vimeo_event_id)
                        <iframe src="https://player.vimeo.com/video/{{ $webtv->vimeo_event_id }}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    @elseif($webtv->video_id)
                        <iframe src="https://player.vimeo.com/video/{{ $webtv->video_id }}" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                    @endif
                </div>
            </div>

            <div class="webtv-details">
                <div class="webtv-header">
                    <h3 class="webtv-title">{{ $webtv->titre }}</h3>
                    <div class="webtv-meta">
                        @if($webtv->date_programmee)
                        <span class="meta-item">
                            <i class="fas fa-calendar-alt"></i>
                            {{ $webtv->date_programmee_formatee }}
                        </span>
                        @endif
                        @if($webtv->duree_estimee_formatee)
                        <span class="meta-item">
                            <i class="fas fa-clock"></i>
                            {{ $webtv->duree_estimee_formatee }}
                        </span>
                        @endif
                        @if($webtv->categorie)
                        <span class="meta-item">
                            <i class="fas fa-tags"></i>
                            {{ ucfirst($webtv->categorie) }}
                        </span>
                        @endif
                    </div>
                </div>

                @if($webtv->description)
                <p class="webtv-description">{{ Str::limit($webtv->description, 120) }}</p>
                @endif

                <div class="webtv-actions">
                    <!-- Status et Toggle dans la même ligne -->
                    <div class="status-controls">
                        <!-- Status Dropdown -->
                        <div class="status-dropdown">
                            <select class="status-select" data-id="{{ $webtv->id }}">
                                <option value="draft" {{ $webtv->statut === 'draft' ? 'selected' : '' }}>Brouillon</option>
                                <option value="programme" {{ $webtv->statut === 'programme' ? 'selected' : '' }}>Programmé</option>
                                <option value="en_direct" {{ $webtv->statut === 'en_direct' ? 'selected' : '' }}>En Direct</option>
                                <option value="termine" {{ $webtv->statut === 'termine' ? 'selected' : '' }}>Terminé</option>
                            </select>
                        </div>

                        <!-- Toggle Actif Amélioré -->
                        <div class="toggle-container">
                            <span class="toggle-text">Visible sur la page WebTV ?</span>
                            <div class="toggle-switch-modern" data-id="{{ $webtv->id }}">
                                <input type="checkbox"
                                       id="toggle-{{ $webtv->id }}"
                                       class="toggle-input"
                                       {{ $webtv->est_actif ? 'checked' : '' }}>
                                <label for="toggle-{{ $webtv->id }}" class="toggle-slider">
                                    <span class="toggle-knob"></span>
                                </label>
                            </div>
                            <span class="toggle-status {{ $webtv->est_actif ? 'active' : 'inactive' }}">
                                {{ $webtv->est_actif ? 'ACTIF' : 'INACTIF' }}
                            </span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <!-- Bouton modifier - Permissions selon le rôle -->
                        @if(auth()->check() && auth()->user()->peutModifierWebtv($webtv))
                            <a href="{{ route('dashboard.webtv.edit', $webtv) }}" class="btn-action btn-edit" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endif

                        <!-- Bouton supprimer - Permissions selon le rôle -->
                        @if(auth()->check() && auth()->user()->peutModifierWebtv($webtv))
                            <form class="d-inline delete-form" action="{{ route('dashboard.webtv.destroy', $webtv) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete" title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                <!-- Alerts -->
                @if($webtv->estEnRetard())
                <div class="webtv-alert alert-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Ce live est en retard !</span>
                </div>
                @endif

                @if($webtv->estProgrammePourAujourdhui())
                <div class="webtv-alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    <span>Programmé pour aujourd'hui</span>
                </div>
                @endif
            </div>
        </div>
        @empty
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-tv"></i>
            </div>
            <h3>Aucun WebTV pour le moment</h3>
            <p>Créez votre premier live Vimeo pour commencer à diffuser.</p>
            <a href="{{ route('dashboard.webtv.media.create') }}" class="btn-primary-modern">
                <i class="fas fa-plus"></i>
                Créer un Live
            </a>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($webtvs->hasPages())
    <div class="pagination-wrapper">
        {{ $webtvs->links() }}
    </div>
    @endif
</div>



@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Preview size persistence
    const select = document.getElementById('preview-size-select');
    const saved = localStorage.getItem('webtvPreviewSize');
    const applySize = (px) => document.documentElement.style.setProperty('--preview-size', px + 'px');

    if (select) {
        if (saved) {
            select.value = saved;
            applySize(saved);
        }
        select.addEventListener('change', () => {
            const val = select.value;
            applySize(val);
            localStorage.setItem('webtvPreviewSize', val);
        });
    }

    // Toggle Actif/Inactif avec popup
    document.querySelectorAll('.toggle-input').forEach(toggle => {
        toggle.addEventListener('change', function() {

            const webtvId = this.closest('.toggle-switch-modern').dataset.id;
            const currentState = this.checked;

            // Chercher le titre dans différents endroits possibles
            let webtvTitle = 'WebTV';

            const cardElement = this.closest('.card');
            if (cardElement) {
                const titleElement = cardElement.querySelector('.webtv-title') ||
                                   cardElement.querySelector('h3') ||
                                   cardElement.querySelector('h4') ||
                                   cardElement.querySelector('h5');

                if (titleElement) {
                    webtvTitle = titleElement.textContent.trim();
                }
            }

            // Message de confirmation
            const action = currentState ? 'activer' : 'désactiver';
            const message = `Voulez-vous vraiment ${action} "${webtvTitle}" ?\n\n${currentState ? 'Cette WebTV sera visible sur la page publique.' : 'Cette WebTV sera cachée de la page publique.'}`;

            if (!confirm(message)) {
                // Annuler le changement si l'utilisateur refuse
                this.checked = !this.checked;
                return;
            }

            // Afficher une popup de chargement
            showNotification('Mise à jour en cours...', 'info');

            fetch(`/dashboard/webtv/${webtvId}/toggle-actif`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {

                if (data.succes) {
                    // Mettre à jour le texte du statut
                    const statusSpan = this.closest('.toggle-container').querySelector('.toggle-status');
                    statusSpan.textContent = data.est_actif ? 'ACTIF' : 'INACTIF';
                    statusSpan.className = `toggle-status ${data.est_actif ? 'active' : 'inactive'}`;

                    // Vérifier que l'état du toggle correspond à la réponse du serveur
                    this.checked = data.est_actif;

                    // Afficher popup de succès
                    const successMessage = data.est_actif ?
                        `"${webtvTitle}" est maintenant ACTIF et visible sur la page WebTV` :
                        `"${webtvTitle}" est maintenant INACTIF et caché de la page WebTV`;

                    showNotification(successMessage, 'success');

                    // Recharger la page après un délai
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                } else {
                    // Remettre le toggle à sa position précédente
                    this.checked = !this.checked;
                    showNotification('Erreur lors de la mise à jour: ' + (data.message || 'Erreur inconnue'), 'error');
                }
            })
            .catch(error => {
                this.checked = !this.checked;
                showNotification('Erreur de connexion: ' + error.message, 'error');
            });
        });
    });

    // Fonction pour afficher les notifications
    function showNotification(message, type = 'info') {
        // Supprimer les anciennes notifications
        const existingNotifications = document.querySelectorAll('.custom-notification');
        existingNotifications.forEach(notification => notification.remove());

        // Créer la nouvelle notification
        const notification = document.createElement('div');
        notification.className = `custom-notification custom-notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <div class="notification-icon">
                    ${type === 'success' ? '✓' : type === 'error' ? '✗' : 'ℹ'}
                </div>
                <div class="notification-message">${message}</div>
                <button class="notification-close" onclick="this.parentElement.parentElement.remove()">×</button>
            </div>
        `;

        // Ajouter les styles si pas déjà présents
        if (!document.querySelector('#notification-styles')) {
            const styles = document.createElement('style');
            styles.id = 'notification-styles';
            styles.textContent = `
                .custom-notification {
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    z-index: 10000;
                    min-width: 300px;
                    max-width: 500px;
                    padding: 0;
                    border-radius: 8px;
                    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
                    animation: slideInRight 0.3s ease-out;
                }
                .custom-notification-success {
                    background-color: #d4edda;
                    border-left: 4px solid #28a745;
                    color: #155724;
                }
                .custom-notification-error {
                    background-color: #f8d7da;
                    border-left: 4px solid #dc3545;
                    color: #721c24;
                }
                .custom-notification-info {
                    background-color: #cce7ff;
                    border-left: 4px solid #007bff;
                    color: #004085;
                }
                .notification-content {
                    display: flex;
                    align-items: center;
                    padding: 15px;
                }
                .notification-icon {
                    font-size: 20px;
                    font-weight: bold;
                    margin-right: 12px;
                    flex-shrink: 0;
                }
                .notification-message {
                    flex-grow: 1;
                    font-weight: 500;
                    line-height: 1.4;
                }
                .notification-close {
                    background: none;
                    border: none;
                    font-size: 20px;
                    font-weight: bold;
                    cursor: pointer;
                    padding: 0;
                    margin-left: 10px;
                    opacity: 0.7;
                    flex-shrink: 0;
                }
                .notification-close:hover {
                    opacity: 1;
                }
                @keyframes slideInRight {
                    from {
                        transform: translateX(100%);
                        opacity: 0;
                    }
                    to {
                        transform: translateX(0);
                        opacity: 1;
                    }
                }
            `;
            document.head.appendChild(styles);
        }

        // Ajouter au document
        document.body.appendChild(notification);

        // Auto-fermeture après 5 secondes sauf pour les erreurs
        if (type !== 'error') {
            setTimeout(() => {
                if (notification.parentElement) {
                    notification.remove();
                }
            }, 5000);
        }
    }

    // Changement de statut
    document.querySelectorAll('.status-select').forEach(select => {
        select.addEventListener('change', function() {
            const id = this.dataset.id;
            const nouveauStatut = this.value;

            fetch(`/dashboard/webtv/${id}/changer-statut`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ statut: nouveauStatut })
            })
            .then(response => {
                if (response.ok) {
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
        });
    });

    // Confirmation suppression
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            if (confirm('Êtes-vous sûr de vouloir supprimer ce WebTV ?')) {
                this.submit();
            }
        });
    });

});

function showToast(message, type = 'info') {
    // Toast notification améliorée
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;

    // Ajouter icône selon le type
    const icon = type === 'success' ? '✓' : type === 'error' ? '✗' : 'ℹ';
    toast.innerHTML = `<span class="toast-icon">${icon}</span><span class="toast-message">${message}</span>`;

    // Couleurs selon le type
    const colors = {
        success: { bg: '#28a745', border: '#1e7e34' },
        error: { bg: '#dc3545', border: '#c82333' },
        info: { bg: '#007bff', border: '#0056b3' }
    };

    const color = colors[type] || colors.info;

    toast.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 1rem 1.5rem;
        background: ${color.bg};
        border-left: 4px solid ${color.border};
        color: white;
        border-radius: 6px;
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        transform: translateX(100%);
        transition: all 0.3s ease;
        font-weight: 500;
        max-width: 350px;
    `;

    document.body.appendChild(toast);

    // Animation d'entrée
    setTimeout(() => {
        toast.style.transform = 'translateX(0)';
    }, 10);

    // Animation de sortie et suppression
    setTimeout(() => {
        toast.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (toast.parentNode) {
                toast.remove();
            }
        }, 300);
    }, 3000);
}
</script>
@endpush
@endsection