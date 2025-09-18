@extends('layouts.dashboard-ultra')

@section('title', 'Voir l\'Article - Excellence Afrik')
@section('page_title', 'Détails de l\'Article')

@push('styles')
<style>
.article-show-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

.show-header {
    background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    color: #D4AF37;
    position: relative;
    overflow: hidden;
}

.show-header::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transform: translate(50%, -50%);
}

.show-header h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    position: relative;
    z-index: 1;
}

.show-header p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
    position: relative;
    z-index: 1;
}

.article-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    margin-bottom: 2rem;
}

.article-meta {
    background: #f8f9fa;
    padding: 1.5rem;
    border-bottom: 1px solid #e9ecef;
}

.meta-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.75rem;
}

.meta-item:last-child {
    margin-bottom: 0;
}

.meta-label {
    font-weight: 600;
    color: #495057;
    min-width: 120px;
}

.meta-value {
    color: #212529;
}

.status-badge {
    padding: 0.35rem 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    text-transform: uppercase;
}

.status-published {
    background: #d4edda;
    color: #155724;
}

.status-draft {
    background: #f8d7da;
    color: #721c24;
}

.status-pending {
    background: #fff3cd;
    color: #856404;
}

.article-content {
    padding: 2rem;
}

.article-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #212529;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.article-excerpt {
    font-size: 1.25rem;
    color: #6c757d;
    font-style: italic;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.featured-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 0.5rem;
    margin-bottom: 2rem;
}

.article-body {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #212529;
}

.article-body h1, .article-body h2, .article-body h3 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: #212529;
}

.article-body p {
    margin-bottom: 1.5rem;
}

.article-body img {
    max-width: 100%;
    height: auto;
    border-radius: 0.5rem;
    margin: 1.5rem 0;
}

.action-buttons {
    padding: 1.5rem;
    background: #f8f9fa;
    border-top: 1px solid #e9ecef;
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
}

.btn-back {
    background: #6c757d;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    text-decoration: none;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-back:hover {
    background: #5a6268;
    color: white;
    text-decoration: none;
    transform: translateY(-1px);
}

.btn-edit {
    background: #D4AF37;
    color: #000;
    padding: 0.75rem 1.5rem;
    border-radius: 0.5rem;
    text-decoration: none;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-edit:hover {
    background: #b8941f;
    color: #000;
    text-decoration: none;
    transform: translateY(-1px);
}

@media (max-width: 768px) {
    .article-show-container {
        padding: 1rem;
    }

    .show-header {
        padding: 1.5rem;
    }

    .show-header h1 {
        font-size: 1.5rem;
    }

    .article-title {
        font-size: 2rem;
    }

    .action-buttons {
        flex-direction: column;
    }
}
</style>
@endpush

@section('content')
<div class="article-show-container">
    <!-- Header -->
    <div class="show-header">
        <h1>
            <i class="fas fa-eye me-2"></i>
            Aperçu de l'Article
        </h1>
        <p>Visualisation complète de l'article avec tous ses détails</p>
    </div>

    <!-- Article Card -->
    <div class="article-card">
        <!-- Meta informations -->
        <div class="article-meta">
            <div class="row">
                <div class="col-md-6">
                    <div class="meta-item">
                        <span class="meta-label">Titre :</span>
                        <span class="meta-value">{{ $article->title }}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Auteur :</span>
                        <span class="meta-value">{{ $article->user->name ?? 'Utilisateur inconnu' }}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Catégorie :</span>
                        <span class="meta-value">{{ $article->category->name ?? 'Sans catégorie' }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="meta-item">
                        <span class="meta-label">Statut :</span>
                        <span class="meta-value">
                            @if($article->status === 'published')
                                <span class="status-badge status-published">
                                    <i class="fas fa-check-circle me-1"></i>Publié
                                </span>
                            @elseif($article->status === 'draft')
                                <span class="status-badge status-draft">
                                    <i class="fas fa-edit me-1"></i>Brouillon
                                </span>
                            @elseif($article->status === 'pending')
                                <span class="status-badge status-pending">
                                    <i class="fas fa-clock me-1"></i>En attente
                                </span>
                            @endif
                        </span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Créé le :</span>
                        <span class="meta-value">{{ $article->created_at->translatedFormat('d F Y à H:i') }}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Modifié le :</span>
                        <span class="meta-value">{{ $article->updated_at->translatedFormat('d F Y à H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Article Content -->
        <div class="article-content">
            <h1 class="article-title">{{ $article->title }}</h1>

            @if($article->excerpt)
                <div class="article-excerpt">
                    {{ $article->excerpt }}
                </div>
            @endif

            @if($article->featured_image_path && file_exists(storage_path('app/public/' . $article->featured_image_path)))
                <img src="{{ asset('storage/' . $article->featured_image_path) }}"
                     alt="{{ $article->featured_image_alt ?? $article->title }}"
                     class="featured-image">
            @elseif($article->featured_image_url)
                <img src="{{ $article->featured_image_url }}"
                     alt="{{ $article->featured_image_alt ?? $article->title }}"
                     class="featured-image">
            @endif

            <div class="article-body">
                {!! $article->content !!}
            </div>

            @if($article->tags)
                <div class="mt-4">
                    <h5>Mots-clés :</h5>
                    @foreach(explode(',', $article->tags) as $tag)
                        <span class="badge bg-secondary me-2">{{ trim($tag) }}</span>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="{{ route('dashboard.articles') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i>
                Retour à la liste
            </a>

            @if(auth()->check() && auth()->user()->peutModifierArticle($article))
                <a href="{{ route('dashboard.articles.edit', $article->id) }}" class="btn-edit">
                    <i class="fas fa-edit"></i>
                    Modifier
                </a>
            @endif
        </div>
    </div>
</div>
@endsection