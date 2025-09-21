@extends('layouts.dashboard-ultra')

@section('title', 'Performance de ' . $user->name . ' - Excellence Afrik')
@section('page_title', 'Performance Journaliste')

@push('styles')
<style>
.journalist-detail-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem;
}

.journalist-header {
    background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    color: #D4AF37;
    position: relative;
    overflow: hidden;
}

.journalist-header::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 200px;
    height: 200px;
    background: rgba(212, 175, 55, 0.1);
    border-radius: 50%;
    transform: translate(50%, -50%);
}

.journalist-profile {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    position: relative;
    z-index: 1;
}

.journalist-avatar-large {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: linear-gradient(135deg, #D4AF37, #B8941F);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 2rem;
    border: 4px solid rgba(212, 175, 55, 0.3);
}

.journalist-info h1 {
    font-size: 2rem;
    font-weight: 700;
    margin: 0 0 0.5rem 0;
}

.journalist-info p {
    opacity: 0.9;
    margin: 0;
    font-size: 1.1rem;
}

.back-btn {
    background: rgba(255, 255, 255, 0.1);
    color: #D4AF37;
    border: 1px solid rgba(212, 175, 55, 0.3);
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    margin-bottom: 1rem;
}

.back-btn:hover {
    background: rgba(212, 175, 55, 0.2);
    color: #D4AF37;
    text-decoration: none;
}

.period-controls {
    position: absolute;
    top: 2rem;
    right: 2rem;
    z-index: 2;
}

.period-select {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(212, 175, 55, 0.3);
    color: #D4AF37;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    backdrop-filter: blur(10px);
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border-radius: 1rem;
    padding: 1.5rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #D4AF37, #2563eb);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
}

.stat-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.stat-info h3 {
    font-size: 2rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
}

.stat-info p {
    color: #6b7280;
    margin: 0.25rem 0 0 0;
    font-weight: 500;
}

.stat-icon {
    width: 50px;
    height: 50px;
    border-radius: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: white;
}

.stat-icon.primary { background: linear-gradient(135deg, #2563eb, #1d4ed8); }
.stat-icon.success { background: linear-gradient(135deg, #10b981, #059669); }
.stat-icon.warning { background: linear-gradient(135deg, #f59e0b, #d97706); }
.stat-icon.info { background: linear-gradient(135deg, #06b6d4, #0891b2); }

.featured-article-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    margin-bottom: 2rem;
}

.featured-header {
    background: linear-gradient(135deg, #059669 0%, #10b981 100%);
    color: white;
    padding: 1.5rem;
}

.featured-header h3 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
}

.charts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
}

.chart-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.chart-header {
    background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
    color: #D4AF37;
    padding: 1.5rem;
}

.chart-header h3 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
}

.articles-table-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.table-header {
    background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
    color: #D4AF37;
    padding: 1.5rem;
}

.table-header h3 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
}

@media (max-width: 768px) {
    .journalist-detail-container {
        padding: 1rem;
    }

    .journalist-header {
        padding: 1.5rem;
    }

    .journalist-profile {
        flex-direction: column;
        text-align: center;
    }

    .period-controls {
        position: relative;
        top: auto;
        right: auto;
        margin-top: 1rem;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .charts-grid {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

@section('content')
<div class="journalist-detail-container">
    <!-- Header sophistiqué du journaliste -->
    <div class="journalist-header">
        <a href="{{ route('dashboard.journalists.index') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Retour à la liste
        </a>

        <div class="period-controls">
            <form method="GET">
                <select name="period" class="period-select" onchange="this.form.submit()">
                    <option value="7" {{ $period == '7' ? 'selected' : '' }}>7 derniers jours</option>
                    <option value="30" {{ $period == '30' ? 'selected' : '' }}>30 derniers jours</option>
                    <option value="90" {{ $period == '90' ? 'selected' : '' }}>3 derniers mois</option>
                    <option value="365" {{ $period == '365' ? 'selected' : '' }}>12 derniers mois</option>
                </select>
            </form>
        </div>

        <div class="journalist-profile">
            <div class="journalist-avatar-large">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div class="journalist-info">
                <h1>Performance de {{ $user->name }}</h1>
                <p>{{ $user->email }} • Journaliste Excellence Afrik</p>
            </div>
        </div>
    </div>

    <!-- Statistiques personnelles avec design sophistiqué -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-info">
                    <h3>{{ $stats['total_articles'] }}</h3>
                    <p>Articles totaux</p>
                </div>
                <div class="stat-icon primary">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-info">
                    <h3>{{ number_format($stats['total_views']) }}</h3>
                    <p>Vues totales</p>
                </div>
                <div class="stat-icon success">
                    <i class="fas fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-info">
                    <h3>{{ number_format($stats['avg_views'], 1) }}</h3>
                    <p>Vues par article</p>
                </div>
                <div class="stat-icon info">
                    <i class="fas fa-chart-bar"></i>
                </div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-info">
                    <h3>{{ $stats['recent_articles'] }}</h3>
                    <p>Articles récents</p>
                </div>
                <div class="stat-icon warning">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Article le plus vu avec design sophistiqué -->
    @if($stats['most_viewed_article'])
    <div class="featured-article-card">
        <div class="featured-header">
            <h3><i class="fas fa-star"></i> Article le plus consulté</h3>
        </div>
        <div style="padding: 2rem;">
            <div style="display: grid; grid-template-columns: 1fr auto; gap: 2rem; align-items: center;">
                <div>
                    <h4 style="color: #1f2937; font-weight: 600; margin: 0 0 1rem 0; font-size: 1.3rem;">
                        {{ $stats['most_viewed_article']->title }}
                    </h4>
                    <p style="color: #6b7280; line-height: 1.5; margin: 0 0 1rem 0;">
                        {{ Str::limit($stats['most_viewed_article']->excerpt, 150) }}
                    </p>
                    <small style="color: #9ca3af; display: flex; align-items: center; gap: 0.5rem;">
                        <i class="fas fa-calendar"></i>
                        Publié le {{ $stats['most_viewed_article']->created_at->translatedFormat('d F Y') }}
                    </small>
                </div>
                <div style="text-align: center;">
                    <div style="background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 1.5rem; border-radius: 1rem; min-width: 120px;">
                        <div style="font-size: 2rem; font-weight: 700; margin: 0;">
                            {{ number_format($stats['most_viewed_article']->view_count) }}
                        </div>
                        <div style="font-size: 0.9rem; opacity: 0.9; margin: 0;">vues</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Graphiques de performance avec design sophistiqué -->
    <div class="charts-grid">
        <div class="chart-card">
            <div class="chart-header">
                <h3><i class="fas fa-chart-line"></i> Articles par mois</h3>
            </div>
            <div style="padding: 1.5rem;">
                @if($stats['articles_by_month']->count() > 0)
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        @foreach($stats['articles_by_month'] as $data)
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 1rem; background: #f8fafc; border-radius: 0.5rem;">
                            <span style="font-weight: 500; color: #374151;">{{ $data['period'] }}</span>
                            <div style="background: linear-gradient(135deg, #2563eb, #1d4ed8); color: white; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.9rem; font-weight: 600;">
                                {{ $data['count'] }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div style="text-align: center; padding: 2rem; color: #6b7280;">
                        <i class="fas fa-chart-line" style="font-size: 2rem; opacity: 0.5; margin-bottom: 1rem;"></i>
                        <p style="margin: 0;">Aucune donnée disponible</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="chart-card">
            <div class="chart-header">
                <h3><i class="fas fa-eye"></i> Vues par mois</h3>
            </div>
            <div style="padding: 1.5rem;">
                @if($stats['views_by_month']->count() > 0)
                    <div style="display: flex; flex-direction: column; gap: 1rem;">
                        @foreach($stats['views_by_month'] as $data)
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 1rem; background: #f8fafc; border-radius: 0.5rem;">
                            <span style="font-weight: 500; color: #374151;">{{ $data['period'] }}</span>
                            <div style="background: linear-gradient(135deg, #06b6d4, #0891b2); color: white; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.9rem; font-weight: 600;">
                                {{ number_format($data['views']) }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div style="text-align: center; padding: 2rem; color: #6b7280;">
                        <i class="fas fa-eye" style="font-size: 2rem; opacity: 0.5; margin-bottom: 1rem;"></i>
                        <p style="margin: 0;">Aucune donnée disponible</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Liste des articles avec design sophistiqué -->
    <div class="articles-table-card">
        <div class="table-header">
            <h3><i class="fas fa-newspaper"></i> Articles récents</h3>
        </div>
        <div style="padding: 0;">
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #f8fafc;">
                            <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; color: #374151; font-size: 0.9rem; text-align: left;">Titre</th>
                            <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; color: #374151; font-size: 0.9rem; text-align: left;">Catégorie</th>
                            <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; color: #374151; font-size: 0.9rem; text-align: left;">Vues</th>
                            <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; color: #374151; font-size: 0.9rem; text-align: left;">Publié le</th>
                            <th style="padding: 1rem 1.5rem; border: none; font-weight: 600; color: #374151; font-size: 0.9rem; text-align: left;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                        <tr style="border-bottom: 1px solid #f3f4f6;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='white'">
                            <td style="padding: 1rem 1.5rem; vertical-align: middle;">
                                <div>
                                    <strong style="color: #1f2937;">{{ Str::limit($article->title, 50) }}</strong>
                                    <div style="margin-top: 0.25rem;">
                                        @if($article->is_featured)
                                            <span style="background: linear-gradient(135deg, #f59e0b, #d97706); color: white; padding: 0.125rem 0.5rem; border-radius: 9999px; font-size: 0.7rem; font-weight: 600; margin-right: 0.25rem;">À la une</span>
                                        @endif
                                        @if($article->is_trending)
                                            <span style="background: linear-gradient(135deg, #ef4444, #dc2626); color: white; padding: 0.125rem 0.5rem; border-radius: 9999px; font-size: 0.7rem; font-weight: 600;">Trending</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td style="padding: 1rem 1.5rem; vertical-align: middle;">
                                @if($article->category)
                                    <span style="background: #e5e7eb; color: #374151; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 600;">{{ $article->category->name }}</span>
                                @else
                                    <span style="color: #6b7280;">Non catégorisé</span>
                                @endif
                            </td>
                            <td style="padding: 1rem 1.5rem; vertical-align: middle;">
                                <span style="background: linear-gradient(135deg, #06b6d4, #0891b2); color: white; padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 600;">{{ number_format($article->view_count) }}</span>
                            </td>
                            <td style="padding: 1rem 1.5rem; vertical-align: middle;">
                                <small style="color: #6b7280;">
                                    {{ $article->created_at->translatedFormat('d M Y') }}
                                </small>
                            </td>
                            <td style="padding: 1rem 1.5rem; vertical-align: middle;">
                                <a href="{{ route('articles.show', $article->slug) }}"
                                   target="_blank"
                                   style="background: linear-gradient(135deg, #D4AF37, #B8941F); color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; font-size: 0.8rem; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease;"
                                   title="Voir l'article"
                                   onmouseover="this.style.transform='translateY(-1px)'; this.style.background='linear-gradient(135deg, #B8941F, #9A7B1A)'"
                                   onmouseout="this.style.transform='translateY(0)'; this.style.background='linear-gradient(135deg, #D4AF37, #B8941F)'">
                                    <i class="fas fa-external-link-alt"></i>
                                    Voir
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 3rem;">
                                <i class="fas fa-newspaper" style="font-size: 3rem; color: #d1d5db; margin-bottom: 1rem;"></i>
                                <p style="color: #6b7280; margin: 0;">Aucun article trouvé pour cette période</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($articles->hasPages())
            <div style="padding: 1.5rem; border-top: 1px solid #f3f4f6; display: flex; justify-content: center;">
                {{ $articles->appends(request()->query())->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection