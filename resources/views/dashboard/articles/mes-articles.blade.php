@extends('layouts.dashboard-ultra')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard-ultra.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/dashboard-pages.css') }}">

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
.articles-management-section {
    background: #f8f9fa;
    min-height: 100vh;
}

/* Header moderne */
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

.header-main {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.header-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--ea-gold), #f39c12);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.header-text h1 {
    color: var(--text-primary);
    font-size: 1.8rem;
    font-weight: 700;
    margin: 0 0 0.25rem 0;
}

.header-text p {
    color: var(--text-secondary);
    margin: 0;
    font-size: 0.95rem;
}

.header-actions {
    display: flex;
    gap: 1rem;
    align-items: center;
}

.btn-modern {
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    border: none;
    font-size: 0.9rem;
    cursor: pointer;
}

.btn-primary-modern {
    background: linear-gradient(135deg, var(--ea-blue), #3b82f6);
    color: white;
}

.btn-primary-modern:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-hover);
    color: white;
    text-decoration: none;
}

/* Filtres modernes */
.filters-section {
    background: white;
    border-radius: 12px;
    box-shadow: var(--shadow-light);
    padding: 1.5rem;
    margin-bottom: 2rem;
}

.filters-row {
    display: flex;
    gap: 1rem;
    align-items: end;
    flex-wrap: wrap;
}

.filter-group {
    flex: 1;
    min-width: 200px;
}

.filter-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: var(--text-primary);
    font-size: 0.9rem;
}

.form-control-modern {
    width: 100%;
    padding: 0.75rem;
    border: 2px solid var(--card-border);
    border-radius: 8px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.form-control-modern:focus {
    outline: none;
    border-color: var(--ea-blue);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

.btn-filter {
    background: var(--ea-green);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    border: none;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-filter:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

/* Articles Grid */
.articles-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.article-card {
    background: white;
    border-radius: 12px;
    box-shadow: var(--shadow-light);
    overflow: hidden;
    transition: all 0.3s ease;
    border: 1px solid var(--card-border);
}

.article-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-hover);
}

.article-image {
    height: 200px;
    position: relative;
    overflow: hidden;
    background: #f8f9fa;
}

.article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.article-image .status-badge {
    position: absolute;
    top: 0.75rem;
    right: 0.75rem;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    color: white;
}

.status-published { background: var(--ea-green); }
.status-draft { background: var(--text-secondary); }
.status-pending { background: #f39c12; }

.article-content {
    padding: 1.5rem;
}

.article-category {
    color: var(--ea-blue);
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 0.5rem;
}

.article-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 0.75rem;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.article-excerpt {
    color: var(--text-secondary);
    font-size: 0.9rem;
    line-height: 1.5;
    margin-bottom: 1rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.article-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.8rem;
    color: var(--text-secondary);
    margin-bottom: 1rem;
}

.article-actions {
    display: flex;
    gap: 0.5rem;
}

.btn-action {
    padding: 0.5rem;
    border-radius: 6px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    transition: all 0.3s ease;
    font-size: 0.9rem;
}

.btn-view { background: #e3f2fd; color: var(--ea-blue); }
.btn-edit { background: #fff3e0; color: #f57c00; }
.btn-delete { background: #ffebee; color: var(--ea-danger); }

.btn-action:hover {
    transform: scale(1.1);
    text-decoration: none;
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
}

/* Empty state */
.empty-state {
    text-align: center;
    padding: 3rem;
    background: white;
    border-radius: 12px;
    box-shadow: var(--shadow-light);
}

.empty-state-icon {
    font-size: 4rem;
    color: var(--text-secondary);
    margin-bottom: 1rem;
}

.empty-state h3 {
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: var(--text-secondary);
    margin-bottom: 1.5rem;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header-modern {
        flex-direction: column;
        align-items: stretch;
        text-align: center;
    }

    .filters-row {
        flex-direction: column;
    }

    .articles-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
}
</style>
@endpush

@section('content')
<div class="articles-management-section">
    <div class="container-fluid">
        <!-- Header -->
        <div class="page-header-modern">
            <div class="header-content">
                <div class="header-main">
                    <div class="header-icon">
                        <i class="fas fa-user-edit"></i>
                    </div>
                    <div class="header-text">
                        <h1>Mes Articles</h1>
                        <p>Gérez vos publications et brouillons</p>
                    </div>
                </div>
            </div>
            <div class="header-actions">
                <a href="{{ route('dashboard.articles.create') }}" class="btn-modern btn-primary-modern">
                    <i class="fas fa-plus"></i>
                    Nouvel Article
                </a>
            </div>
        </div>

        <!-- Filtres -->
        <div class="filters-section">
            <form method="GET" action="{{ route('dashboard.mes-articles') }}">
                <div class="filters-row">
                    <div class="filter-group">
                        <label for="search">Rechercher</label>
                        <input type="text"
                               id="search"
                               name="search"
                               class="form-control-modern"
                               placeholder="Titre, contenu..."
                               value="{{ request('search') }}">
                    </div>
                    <div class="filter-group">
                        <label for="category">Catégorie</label>
                        <select id="category" name="category" class="form-control-modern">
                            <option value="">Toutes les catégories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-group">
                        <label for="status">Statut</label>
                        <select id="status" name="status" class="form-control-modern">
                            <option value="">Tous les statuts</option>
                            <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Publié</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Brouillon</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>En attente</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <button type="submit" class="btn-filter">
                            <i class="fas fa-search"></i>
                            Filtrer
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Articles Grid -->
        @if($articles->count() > 0)
            <div class="articles-grid">
                @foreach($articles as $article)
                    <div class="article-card">
                        <div class="article-image">
                            @if($article->featured_image_path && file_exists(storage_path('app/public/' . $article->featured_image_path)))
                                <img src="{{ asset('storage/app/public/' . $article->featured_image_path) }}" alt="{{ $article->title }}">
                            @else
                                <div class="d-flex align-items-center justify-content-center h-100 bg-light">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                            @endif
                            <span class="status-badge status-{{ $article->status }}">
                                @switch($article->status)
                                    @case('published')
                                        Publié
                                        @break
                                    @case('draft')
                                        Brouillon
                                        @break
                                    @case('pending')
                                        En attente
                                        @break
                                    @default
                                        {{ ucfirst($article->status) }}
                                @endswitch
                            </span>
                        </div>

                        <div class="article-content">
                            @if($article->category)
                                <div class="article-category">{{ $article->category->name }}</div>
                            @endif

                            <h3 class="article-title">{{ $article->title }}</h3>

                            <p class="article-excerpt">{{ $article->excerpt }}</p>

                            <div class="article-meta">
                                <span>{{ $article->created_at->format('d/m/Y') }}</span>
                                <span>{{ $article->views ?? 0 }} vues</span>
                            </div>

                            <div class="article-actions">
                                <a href="{{ route('dashboard.articles.show', $article->id) }}" class="btn-action btn-view" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('dashboard.articles.edit', $article->id) }}" class="btn-action btn-edit" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="confirmDelete({{ $article->id }})" class="btn-action btn-delete" title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-wrapper">
                {{ $articles->links() }}
            </div>
        @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h3>Aucun article trouvé</h3>
                <p>Vous n'avez pas encore créé d'articles ou aucun article ne correspond à vos critères de recherche.</p>
                <a href="{{ route('dashboard.articles.create') }}" class="btn-modern btn-primary-modern">
                    <i class="fas fa-plus"></i>
                    Créer mon premier article
                </a>
            </div>
        @endif
    </div>
</div>

<script>
function confirmDelete(articleId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) {
        fetch(`/dashboard/articles/${articleId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Erreur lors de la suppression');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Erreur lors de la suppression');
        });
    }
}
</script>
@endsection