<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard Excellence Afrik - Plateforme Éditoriale Africaine')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-ultra.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-pages.css') }}">

    @stack('styles')

    <style>
        /* CSS pour le bouton de déconnexion dans la sidebar */
        .nav-logout-form {
            margin: 0;
            padding: 0;
            width: 100%;
        }

        .nav-logout-btn {
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            padding: 0.875rem 1.5rem;
            color: inherit;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .nav-logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #dc3545;
            text-decoration: none;
        }

        .nav-logout-btn .nav-icon {
            width: 20px;
            text-align: center;
        }

        .nav-logout-btn .nav-text {
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Styles pour les notifications */
        .notification-dropdown {
            width: 380px;
            max-height: 400px;
            border: 1px solid #e0e0e0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            border-radius: 8px;
        }

        .notification-list {
            max-height: 300px;
            overflow-y: auto;
        }

        .notification-item {
            padding: 12px 16px;
            border-bottom: 1px solid #f0f0f0;
            transition: background-color 0.2s;
            cursor: pointer;
            position: relative;
        }

        .notification-item:hover {
            background-color: #f8f9fa;
        }

        .notification-item.unread {
            background-color: #e8f4f8;
            border-left: 4px solid #0066cc;
        }

        .notification-item.unread::before {
            content: '';
            position: absolute;
            right: 12px;
            top: 16px;
            width: 8px;
            height: 8px;
            background-color: #0066cc;
            border-radius: 50%;
        }

        .notification-content {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .notification-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: white;
            flex-shrink: 0;
        }

        .notification-icon.article { background-color: #28a745; }
        .notification-icon.user { background-color: #007bff; }
        .notification-icon.webtv { background-color: #dc3545; }
        .notification-icon.system { background-color: #6c757d; }

        .notification-text {
            flex: 1;
        }

        .notification-title {
            font-weight: 600;
            font-size: 13px;
            margin-bottom: 2px;
            color: #333;
        }

        .notification-message {
            font-size: 12px;
            color: #666;
            line-height: 1.4;
        }

        .notification-time {
            font-size: 11px;
            color: #999;
            margin-top: 4px;
        }

        .notification-badge {
            background-color: #dc3545;
            color: white;
            font-size: 10px;
            font-weight: 600;
            padding: 2px 6px;
            border-radius: 50%;
            position: absolute;
            top: -2px;
            right: -2px;
            min-width: 16px;
            text-align: center;
        }
    </style>
</head>

<body class="dashboard-body">
    @php
        // Charger les catégories actives pour le sous-menu (sidebar)
        try {
            $sidebarCategories = \App\Models\Category::where('status', 'active')
                ->where('is_active', 1)
                ->orderBy('name')
                ->get();
        } catch (\Throwable $e) {
            $sidebarCategories = collect();
        }
    @endphp

    <!-- Dashboard Container -->
    <div class="dashboard-ultra-container">

        <!-- Sidebar Navigation -->
        <aside class="dashboard-sidebar" id="dashboardSidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <i class="fas fa-crown" style="color: #D4AF37; font-size: 1.5rem;"></i>
                    <span class="sidebar-logo-text">Excellence Afrik</span>
                </div>
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section">
                    <div class="nav-section-title">Principal</div>
                    <ul class="nav-menu">
                        <!-- Tableau de Bord - Accessible à tous -->
                        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <a href="{{ route('dashboard') }}" class="nav-link" data-section="dashboard">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <span class="nav-text">Tableau de Bord</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Gestion</div>
                    <ul class="nav-menu">
                        <!-- Gestion des Articles -->
                        <li class="nav-item has-submenu {{ request()->routeIs('dashboard.articles') ? 'active' : '' }}">
                            <a href="#" class="nav-link submenu-toggle">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <span class="nav-text">Gestion des Articles</span>
                                <i class="submenu-arrow fas fa-chevron-down"></i>
                            </a>
                            <ul class="nav-submenu">
                                <!-- Créer article - Accessible à tous -->
                                <li class="nav-subitem">
                                    <a href="{{ route('dashboard.articles.create') }}" class="nav-sublink" data-section="add-article">
                                        <i class="nav-subicon fas fa-plus"></i>
                                        <span class="nav-subtext">Ajouter un article</span>
                                    </a>
                                </li>
                                
                                <!-- Liste des articles - Accessible à tous -->
                                <li class="nav-subitem">
                                    <a href="{{ route('dashboard.articles') }}" class="nav-sublink" data-section="list-articles">
                                        <i class="nav-subicon fas fa-list"></i>
                                        <span class="nav-subtext">Liste des articles</span>
                                    </a>
                                </li>
                                
                                <!-- Mes articles - Seulement pour journalistes -->
                                @if(auth()->check() && auth()->user()->estJournaliste())
                                    <li class="nav-subitem">
                                        <a href="{{ route('dashboard.mes-articles') }}" class="nav-sublink" data-section="mes-articles">
                                            <i class="nav-subicon fas fa-user-edit"></i>
                                            <span class="nav-subtext">Mes articles</span>
                                        </a>
                                    </li>
                                @endif
                                
                                <!-- Catégories - Lecture pour tous -->
                                <li class="nav-subitem">
                                    <a href="{{ route('dashboard.categories.index') }}" class="nav-sublink" data-section="list-categories">
                                        <i class="nav-subicon fas fa-folder-tree"></i>
                                        <span class="nav-subtext">Catégories</span>
                                    </a>
                                </li>
                                
                                <!-- Créer catégorie - Seulement Admin et Directeur -->
                                @if(auth()->check() && (auth()->user()->estAdmin() || auth()->user()->estDirecteurPublication()))
                                    <li class="nav-subitem">
                                        <a href="{{ route('dashboard.categories.create') }}" class="nav-sublink" data-section="add-article-category">
                                            <i class="nav-subicon fas fa-folder-plus"></i>
                                            <span class="nav-subtext">Ajouter une catégorie</span>
                                        </a>
                                    </li>
                                @endif
                                @if(isset($sidebarCategories) && $sidebarCategories->count())
                                    @foreach($sidebarCategories as $cat)
                                        <li class="nav-subitem">
                                            <a href="{{ route('dashboard.categories.edit', $cat->id) }}" class="nav-sublink" title="Éditer {{ $cat->name }}">
                                                <i class="nav-subicon fas fa-folder"></i>
                                                <span class="nav-subtext">{{ $cat->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                                <li class="nav-subitem">
                                    <a href="#article-drafts" class="nav-sublink" data-section="article-drafts">
                                        <i class="nav-subicon fas fa-edit"></i>
                                        <span class="nav-subtext">Brouillons</span>
                                    </a>
                                </li>
                                <li class="nav-subitem">
                                    <a href="#article-comments" class="nav-sublink" data-section="article-comments">
                                        <i class="nav-subicon fas fa-comments"></i>
                                        <span class="nav-subtext">Commentaires</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <!-- Gestion WebTV - Accessible à tous les utilisateurs authentifiés -->
                        @if(auth()->check())
                            <li class="nav-item has-submenu {{ request()->routeIs('dashboard.webtv.*') ? 'active' : '' }}">
                                <a href="#" class="nav-link submenu-toggle">
                                    <i class="nav-icon fas fa-video"></i>
                                    <span class="nav-text">Gestion WebTV</span>
                                    <i class="submenu-arrow fas fa-chevron-down"></i>
                                </a>
                            <ul class="nav-submenu">
                                <li class="nav-subitem">
                                    <a href="{{ route('dashboard.webtv.media.create') }}" class="nav-sublink" data-section="add-webtv-media">
                                        <i class="nav-subicon fas fa-plus"></i>
                                        <span class="nav-subtext">Créer un Live</span>
                                    </a>
                                </li>
                                <li class="nav-subitem">
                                    <a href="{{ route('dashboard.webtv.programs.create') }}" class="nav-sublink" data-section="add-webtv-program">
                                        <i class="nav-subicon fas fa-tv"></i>
                                        <span class="nav-subtext">Créer un Programme</span>
                                    </a>
                                </li>
                                <li class="nav-subitem">
                                    <a href="{{ route('dashboard.webtv.index') }}" class="nav-sublink" data-section="list-webtv">
                                        <i class="nav-subicon fas fa-list"></i>
                                        <span class="nav-subtext">
                                            @if(auth()->user()->estJournaliste())
                                                Mes Événements WebTV
                                            @else
                                                Tous les Événements WebTV
                                            @endif
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        <!-- Gestion des Magazines - Seulement Admin et Directeur -->
                        @if(auth()->check() && (auth()->user()->estAdmin() || auth()->user()->estDirecteurPublication()))
                            <li class="nav-item has-submenu {{ request()->routeIs('dashboard.magazines.*') ? 'active' : '' }}">
                                <a href="#" class="nav-link submenu-toggle">
                                    <i class="nav-icon fas fa-book-open"></i>
                                    <span class="nav-text">Gestion des Magazines</span>
                                    <i class="submenu-arrow fas fa-chevron-down"></i>
                                </a>
                            <ul class="nav-submenu">
                                <li class="nav-subitem">
                                    <a href="{{ route('dashboard.magazines.index') }}" class="nav-sublink" data-section="list-magazines">
                                        <i class="nav-subicon fas fa-list"></i>
                                        <span class="nav-subtext">Liste des magazines</span>
                                    </a>
                                </li>
                                <li class="nav-subitem">
                                    <a href="{{ route('dashboard.magazines.create') }}" class="nav-sublink" data-section="add-magazine">
                                        <i class="nav-subicon fas fa-plus"></i>
                                        <span class="nav-subtext">Nouveau magazine</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        <!-- Gestion des Publicités - Seulement Admin et Directeur -->
                        @if(auth()->check() && (auth()->user()->estAdmin() || auth()->user()->estDirecteurPublication()))
                            <li class="nav-item has-submenu {{ request()->routeIs('dashboard.advertisements.*') ? 'active' : '' }}">
                                <a href="#" class="nav-link submenu-toggle">
                                    <i class="nav-icon fas fa-bullhorn"></i>
                                    <span class="nav-text">Gestion des Publicités</span>
                                    <i class="submenu-arrow fas fa-chevron-down"></i>
                                </a>
                            <ul class="nav-submenu">
                                <li class="nav-subitem">
                                    <a href="{{ route('dashboard.advertisements.index') }}" class="nav-sublink" data-section="list-advertisements">
                                        <i class="nav-subicon fas fa-list"></i>
                                        <span class="nav-subtext">Liste des publicités</span>
                                    </a>
                                </li>
                                <li class="nav-subitem">
                                    <a href="{{ route('dashboard.advertisements.create') }}" class="nav-sublink" data-section="add-advertisement">
                                        <i class="nav-subicon fas fa-plus"></i>
                                        <span class="nav-subtext">Nouvelle publicité</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        <!-- Gestion des Journalistes - Seulement Admin et Directeur -->
                        @if(auth()->check() && (auth()->user()->estAdmin() || auth()->user()->estDirecteurPublication()))
                            <li class="nav-item has-submenu {{ request()->routeIs('dashboard.journalists.*') ? 'active' : '' }}">
                                <a href="#" class="nav-link submenu-toggle">
                                    <i class="nav-icon fas fa-chart-line"></i>
                                    <span class="nav-text">Gestion des Journalistes</span>
                                    <i class="submenu-arrow fas fa-chevron-down"></i>
                                </a>
                            <ul class="nav-submenu">
                                <li class="nav-subitem">
                                    <a href="{{ route('dashboard.journalists.index') }}" class="nav-sublink" data-section="list-journalists">
                                        <i class="nav-subicon fas fa-users"></i>
                                        <span class="nav-subtext">Performance des journalistes</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        <!-- Gestion des Utilisateurs - Seulement Admin et Directeur -->
                        @if(auth()->check() && (auth()->user()->estAdmin() || auth()->user()->estDirecteurPublication()))
                            <li class="nav-item has-submenu {{ request()->routeIs('dashboard.users') ? 'active' : '' }}">
                                <a href="#" class="nav-link submenu-toggle">
                                    <i class="nav-icon fas fa-users"></i>
                                    <span class="nav-text">Gestion des Utilisateurs</span>
                                    <i class="submenu-arrow fas fa-chevron-down"></i>
                                </a>
                            <ul class="nav-submenu">
                                <li class="nav-subitem">
                                    <a href="{{ route('dashboard.users') }}" class="nav-sublink" data-section="list-users">
                                        <i class="nav-subicon fas fa-list"></i>
                                        <span class="nav-subtext">Liste des utilisateurs</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        <!-- Gestion des Flash Info - Seulement Admin et Directeur -->
                        @if(auth()->check() && (auth()->user()->estAdmin() || auth()->user()->estDirecteurPublication()))
                            <li class="nav-item has-submenu {{ request()->routeIs('dashboard.flash-infos.*') ? 'active' : '' }}">
                                <a href="#" class="nav-link submenu-toggle">
                                    <i class="nav-icon fas fa-bolt text-warning"></i>
                                    <span class="nav-text">Flash Info</span>
                                    <i class="submenu-arrow fas fa-chevron-down"></i>
                                </a>
                                <ul class="nav-submenu">
                                    <li class="nav-subitem">
                                        <a href="{{ route('dashboard.flash-infos.index') }}" class="nav-sublink" data-section="list-flash-infos">
                                            <i class="nav-subicon fas fa-list"></i>
                                            <span class="nav-subtext">Liste des Flash Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-subitem">
                                        <a href="{{ route('dashboard.flash-infos.create') }}" class="nav-sublink" data-section="add-flash-info">
                                            <i class="nav-subicon fas fa-plus"></i>
                                            <span class="nav-subtext">Nouvelle Flash Info</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        <!-- Gestion Newsletters - Masqué pour les journalistes -->
                        @if(auth()->check() && !auth()->user()->estJournaliste())
                            <li class="nav-item has-submenu">
                                <a href="#" class="nav-link submenu-toggle">
                                    <i class="nav-icon fas fa-envelope"></i>
                                    <span class="nav-text">Gestion Newsletters</span>
                                    <i class="submenu-arrow fas fa-chevron-down"></i>
                                </a>
                                <ul class="nav-submenu">
                                    <li class="nav-subitem">
                                        <a href="{{ route('dashboard.newsletter.index') }}" class="nav-sublink">
                                            <i class="nav-subicon fas fa-users"></i>
                                            <span class="nav-subtext">Abonnés</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Gestion des Contacts -->
                            <li class="nav-item {{ request()->routeIs('dashboard.contacts.*') ? 'active' : '' }}">
                                <a href="{{ route('dashboard.contacts.index') }}" class="nav-link" data-section="contacts">
                                    <i class="nav-icon fas fa-message"></i>
                                    <span class="nav-text">Messages de Contact</span>
                                    @php
                                        $nouveauxContacts = \App\Models\Contact::nouveaux()->count();
                                    @endphp
                                    @if($nouveauxContacts > 0)
                                        <span class="nav-badge">{{ $nouveauxContacts }}</span>
                                    @endif
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Configuration</div>
                    <ul class="nav-menu">
                        <!-- Profil - Accessible à tous -->
                        <li class="nav-item {{ request()->routeIs('dashboard.profile') ? 'active' : '' }}">
                            <a href="{{ route('dashboard.profile') }}" class="nav-link" data-section="profile">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <span class="nav-text">Profil</span>
                            </a>
                        </li>

                        <!-- Déconnexion - Accessible à tous -->
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="nav-logout-form">
                                @csrf
                                <button type="submit" class="nav-link nav-logout-btn" data-section="logout">
                                    <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                                    <span class="nav-text text-danger">Se déconnecter</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

           
        </aside>

        <!-- Main Content -->
        <main class="dashboard-main">
            <!-- Top Header -->
            <header class="dashboard-header">
                <div class="header-left">
                    <button class="mobile-menu-toggle" id="mobileMenuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="breadcrumb-nav">
                        <span class="breadcrumb-item active">@yield('page_title', 'Tableau de Bord')</span>
                        <span class="breadcrumb-separator">•</span>
                        <span class="breadcrumb-subtitle">Excellence Afrik - Plateforme Éditoriale</span>
                    </div>
                </div>

                <div class="header-right">
                    <div class="header-search">
                        <input type="text" class="search-input" placeholder="Rechercher articles, auteurs, statistiques...">
                        <i class="fas fa-search search-icon"></i>
                        <div class="search-suggestions" id="searchSuggestions" style="display: none;">
                            <div class="suggestion-item">
                                <i class="fas fa-newspaper"></i>
                                <span>Articles récents</span>
                            </div>
                            <div class="suggestion-item">
                                <i class="fas fa-chart-line"></i>
                                <span>Statistiques</span>
                            </div>
                            <div class="suggestion-item">
                                <i class="fas fa-users"></i>
                                <span>Auteurs</span>
                            </div>
                        </div>
                    </div>

                    <div class="header-actions">
                        <!-- Notifications Dropdown -->
                        <div class="dropdown">
                            <button class="action-btn notification-btn" type="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                <span class="notification-badge" id="notificationCount" style="display: none;">0</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end notification-dropdown" aria-labelledby="notificationDropdown">
                                <div class="dropdown-header d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">Notifications</h6>
                                    <button class="btn btn-sm btn-outline-primary" onclick="markAllAsRead()">
                                        <i class="fas fa-check-double"></i> Tout marquer lu
                                    </button>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div id="notificationsList" class="notification-list">
                                    <div class="text-center text-muted p-3">
                                        <i class="fas fa-bell-slash fa-2x mb-2"></i>
                                        <p class="mb-0">Aucune notification</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="user-avatar-small">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                        </div>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="dashboard-content">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="border-radius: 12px; border: none; background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: white;">
                        <i class="fas fa-check-circle me-2"></i>
                        <strong>Succès !</strong> {{ session('success') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" style="border-radius: 12px; border: none; background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white;">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Erreur !</strong> {{ session('error') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show mb-4" role="alert" style="border-radius: 12px; border: none; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); color: white;">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Attention !</strong> {{ session('warning') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('info'))
                    <div class="alert alert-info alert-dismissible fade show mb-4" role="alert" style="border-radius: 12px; border: none; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); color: white;">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Information !</strong> {{ session('info') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('assets/js/dashboard-ultra.js') }}"></script>

    <!-- Notifications System -->
    <div id="notification-container" class="position-fixed top-0 end-0 p-3" style="z-index: 9999; max-width: 400px;">
        <!-- Les notifications seront ajoutées ici dynamiquement -->
    </div>

    @stack('scripts')

    <!-- Notification System Script -->
    <script>
        // Système de notifications global
        function showNotification(message, type = 'info', duration = 5000) {
            const container = document.getElementById('notification-container');
            const notificationId = 'notification-' + Date.now();
            
            const notificationHTML = `
                <div id="${notificationId}" class="toast align-items-center text-bg-${type} border-0 mb-2" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <i class="fas ${getNotificationIcon(type)} me-2"></i>
                            ${message}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            `;
            
            container.insertAdjacentHTML('beforeend', notificationHTML);
            
            const toastElement = document.getElementById(notificationId);
            const toast = new bootstrap.Toast(toastElement, {
                autohide: true,
                delay: duration
            });
            
            toast.show();
            
            // Nettoyer après disparition
            toastElement.addEventListener('hidden.bs.toast', function () {
                this.remove();
            });
        }
        
        function getNotificationIcon(type) {
            const icons = {
                'success': 'fa-check-circle',
                'danger': 'fa-exclamation-triangle',
                'warning': 'fa-exclamation-circle',
                'info': 'fa-info-circle'
            };
            return icons[type] || icons['info'];
        }
        
        // Gestion des notifications du dropdown
        let notifications = [];
        let unreadCount = 0;

        // Simuler des notifications basées sur le rôle de l'utilisateur
        function initializeNotifications() {
            const userRole = '{{ Auth::user()->nom_role ?? "journaliste" }}';
            const userName = '{{ Auth::user()->name ?? "Utilisateur" }}';

            // Notifications communes à tous les profils
            const commonNotifications = [
                {
                    id: 1,
                    type: 'system',
                    title: 'Bienvenue sur Excellence Afrik',
                    message: 'Système de notifications activé avec succès',
                    time: 'Il y a 2 minutes',
                    unread: true,
                    icon: 'fa-check-circle'
                },
                {
                    id: 2,
                    type: 'article',
                    title: 'Nouvel article publié',
                    message: 'Article "Économie africaine 2024" maintenant disponible',
                    time: 'Il y a 1 heure',
                    unread: true,
                    icon: 'fa-newspaper'
                }
            ];

            // Notifications spécifiques par rôle
            const roleNotifications = {
                'admin': [
                    {
                        id: 3,
                        type: 'user',
                        title: 'Nouvel utilisateur',
                        message: 'Un nouveau journaliste s\'est inscrit',
                        time: 'Il y a 30 minutes',
                        unread: true,
                        icon: 'fa-user-plus'
                    },
                    {
                        id: 4,
                        type: 'system',
                        title: 'Sauvegarde système',
                        message: 'Sauvegarde automatique effectuée avec succès',
                        time: 'Il y a 2 heures',
                        unread: false,
                        icon: 'fa-database'
                    }
                ],
                'directeur_publication': [
                    {
                        id: 5,
                        type: 'article',
                        title: 'Article en attente',
                        message: '3 articles attendent votre validation',
                        time: 'Il y a 15 minutes',
                        unread: true,
                        icon: 'fa-clock'
                    },
                    {
                        id: 6,
                        type: 'webtv',
                        title: 'WebTV programmée',
                        message: 'Live "Débat économique" prévu à 15h',
                        time: 'Il y a 45 minutes',
                        unread: true,
                        icon: 'fa-video'
                    }
                ],
                'journaliste': [
                    {
                        id: 7,
                        type: 'article',
                        title: 'Article approuvé',
                        message: 'Votre article "Innovation tech" a été publié',
                        time: 'Il y a 20 minutes',
                        unread: true,
                        icon: 'fa-check'
                    },
                    {
                        id: 8,
                        type: 'system',
                        title: 'Rappel',
                        message: 'N\'oubliez pas de mettre à jour votre profil',
                        time: 'Il y a 1 jour',
                        unread: false,
                        icon: 'fa-user-edit'
                    }
                ]
            };

            // Combiner les notifications
            notifications = [...commonNotifications];
            if (roleNotifications[userRole]) {
                notifications = [...notifications, ...roleNotifications[userRole]];
            }

            // Calculer le nombre de non lues
            unreadCount = notifications.filter(n => n.unread).length;

            // Mettre à jour l'affichage
            updateNotificationBadge();
            updateNotificationsList();
        }

        function updateNotificationBadge() {
            const badge = document.getElementById('notificationCount');
            if (unreadCount > 0) {
                badge.textContent = unreadCount > 99 ? '99+' : unreadCount;
                badge.style.display = 'block';
            } else {
                badge.style.display = 'none';
            }
        }

        function updateNotificationsList() {
            const container = document.getElementById('notificationsList');

            if (notifications.length === 0) {
                container.innerHTML = `
                    <div class="text-center text-muted p-3">
                        <i class="fas fa-bell-slash fa-2x mb-2"></i>
                        <p class="mb-0">Aucune notification</p>
                    </div>
                `;
                return;
            }

            const notificationsHTML = notifications.map(notification => `
                <div class="notification-item ${notification.unread ? 'unread' : ''}" onclick="markAsRead(${notification.id})">
                    <div class="notification-content">
                        <div class="notification-icon ${notification.type}">
                            <i class="fas ${notification.icon}"></i>
                        </div>
                        <div class="notification-text">
                            <div class="notification-title">${notification.title}</div>
                            <div class="notification-message">${notification.message}</div>
                            <div class="notification-time">${notification.time}</div>
                        </div>
                    </div>
                </div>
            `).join('');

            container.innerHTML = notificationsHTML;
        }

        function markAsRead(notificationId) {
            const notification = notifications.find(n => n.id === notificationId);
            if (notification && notification.unread) {
                notification.unread = false;
                unreadCount = Math.max(0, unreadCount - 1);
                updateNotificationBadge();
                updateNotificationsList();
            }
        }

        function markAllAsRead() {
            notifications.forEach(n => n.unread = false);
            unreadCount = 0;
            updateNotificationBadge();
            updateNotificationsList();
            showNotification('Toutes les notifications ont été marquées comme lues', 'success');
        }


        // Simuler de nouvelles notifications
        function addNotification(type, title, message, icon = 'fa-info-circle') {
            const newNotification = {
                id: Date.now(),
                type: type,
                title: title,
                message: message,
                time: 'À l\'instant',
                unread: true,
                icon: icon
            };

            notifications.unshift(newNotification);
            unreadCount++;
            updateNotificationBadge();
            updateNotificationsList();
        }

        // Afficher les messages de session Laravel
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser les notifications
            initializeNotifications();

            @if(session('success'))
                showNotification("{{ session('success') }}", 'success');
            @endif

            @if(session('error'))
                showNotification("{{ session('error') }}", 'danger');
            @endif

            @if(session('warning'))
                showNotification("{{ session('warning') }}", 'warning');
            @endif

            @if(session('info'))
                showNotification("{{ session('info') }}", 'info');
            @endif

            @if($errors->any())
                @foreach($errors->all() as $error)
                    showNotification("{{ $error }}", 'danger');
                @endforeach
            @endif

            // Simuler de nouvelles notifications périodiquement (pour la démo)
            setInterval(() => {
                const types = ['article', 'user', 'webtv', 'system'];
                const messages = [
                    { type: 'article', title: 'Nouvel article', message: 'Un nouvel article a été publié', icon: 'fa-newspaper' },
                    { type: 'user', title: 'Nouveau commentaire', message: 'Votre article a reçu un nouveau commentaire', icon: 'fa-comment' },
                    { type: 'webtv', title: 'WebTV en live', message: 'Une émission WebTV a commencé', icon: 'fa-play-circle' },
                    { type: 'system', title: 'Mise à jour', message: 'Le système a été mis à jour', icon: 'fa-sync' }
                ];

                const randomMessage = messages[Math.floor(Math.random() * messages.length)];
                addNotification(randomMessage.type, randomMessage.title, randomMessage.message, randomMessage.icon);
            }, 30000); // Nouvelle notification toutes les 30 secondes
        });
    </script>
</body>
</html>
