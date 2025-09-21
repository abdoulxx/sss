@extends('layouts.dashboard-ultra')

@section('title', 'Gestion des Journalistes - Excellence Afrik')
@section('page_title', 'Performance des Journalistes')

@push('styles')
<style>
.journalists-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem;
}

.journalists-header {
    background: linear-gradient(135deg, #1a1a1a 0%, #000000 100%);
    border-radius: 1rem;
    padding: 2rem;
    margin-bottom: 2rem;
    color: #D4AF37;
    position: relative;
    overflow: hidden;
}

.journalists-header::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 250px;
    height: 250px;
    background: rgba(212, 175, 55, 0.1);
    border-radius: 50%;
    transform: translate(50%, -50%);
}

.journalists-header h1 {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    position: relative;
    z-index: 1;
}

.journalists-header p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin: 0;
    position: relative;
    z-index: 1;
}

.header-controls {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    margin-bottom: 2rem;
}

.period-filter {
    background: white;
    border-radius: 0.75rem;
    padding: 0.5rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
    gap: 1rem;
}

.period-filter select {
    border: none;
    background: transparent;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 600;
    color: #374151;
}


.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
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
    width: 60px;
    height: 60px;
    border-radius: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
}

.stat-icon.primary { background: linear-gradient(135deg, #2563eb, #1d4ed8); }
.stat-icon.success { background: linear-gradient(135deg, #10b981, #059669); }
.stat-icon.warning { background: linear-gradient(135deg, #f59e0b, #d97706); }
.stat-icon.info { background: linear-gradient(135deg, #06b6d4, #0891b2); }

.top-performers {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
}

.performer-card {
    background: white;
    border-radius: 1rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    overflow: hidden;
}

.performer-header {
    background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
    color: #D4AF37;
    padding: 1.5rem;
    position: relative;
}

.performer-header h3 {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
}

.performer-list {
    padding: 1.5rem;
}

.performer-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid #f3f4f6;
}

.performer-item:last-child {
    border-bottom: none;
}

.performer-rank {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #D4AF37, #B8941F);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 0.9rem;
}

.performer-info {
    flex: 1;
}

.performer-name {
    font-weight: 600;
    color: #1f2937;
    margin: 0;
}

.performer-email {
    color: #6b7280;
    font-size: 0.8rem;
    margin: 0;
}

.performer-badge {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.8rem;
    font-weight: 600;
}

.journalists-table-card {
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

.table-content {
    padding: 0;
}

.journalists-table {
    margin: 0;
    width: 100%;
}

.journalists-table thead th {
    background: #f8fafc;
    border: none;
    padding: 1rem 1.5rem;
    font-weight: 600;
    color: #374151;
    font-size: 0.9rem;
}

.journalists-table tbody td {
    padding: 1rem 1.5rem;
    border-bottom: 1px solid #f3f4f6;
    vertical-align: middle;
}

.journalists-table tbody tr:hover {
    background: #f8fafc;
}

.journalist-avatar {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
}

.metric-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.8rem;
    font-weight: 600;
}

.metric-primary { background: #dbeafe; color: #1d4ed8; }
.metric-success { background: #dcfce7; color: #16a34a; }
.metric-warning { background: #fef3c7; color: #d97706; }
.metric-info { background: #cffafe; color: #0891b2; }

.action-btn {
    background: linear-gradient(135deg, #D4AF37, #B8941F);
    color: white;
    border: none;
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-size: 0.8rem;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.action-btn:hover {
    background: linear-gradient(135deg, #B8941F, #9A7B1A);
    transform: translateY(-1px);
    color: white;
    text-decoration: none;
}

@media (max-width: 768px) {
    .journalists-container {
        padding: 1rem;
    }

    .journalists-header {
        padding: 1.5rem;
    }

    .header-controls {
        justify-content: center;
    }

    .period-filter {
        justify-content: center;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .top-performers {
        grid-template-columns: 1fr;
    }
}
</style>
@endpush

@section('content')
<div class="journalists-container">
    <!-- Header sophistiqué -->
    <div class="journalists-header">
        <h1><i class="fas fa-chart-line"></i> Performance des Journalistes</h1>
        <p>Analyse détaillée des performances et statistiques de votre équipe éditoriale</p>
    </div>

    <!-- Contrôles du header -->
    <div class="header-controls">
        <div class="period-filter">
            <i class="fas fa-calendar-alt" style="color: #6b7280;"></i>
            <form method="GET" style="margin: 0;">
                <select name="period" onchange="this.form.submit()">
                    <option value="7" {{ $period == '7' ? 'selected' : '' }}>7 derniers jours</option>
                    <option value="30" {{ $period == '30' ? 'selected' : '' }}>30 derniers jours</option>
                    <option value="90" {{ $period == '90' ? 'selected' : '' }}>3 derniers mois</option>
                    <option value="365" {{ $period == '365' ? 'selected' : '' }}>12 derniers mois</option>
                </select>
            </form>
        </div>
    </div>

    <!-- Statistiques globales avec design sophistiqué -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-info">
                    <h3>{{ $globalStats['total_journalists'] }}</h3>
                    <p>Journalistes actifs</p>
                </div>
                <div class="stat-icon primary">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-info">
                    <h3>{{ number_format($globalStats['total_articles']) }}</h3>
                    <p>Articles publiés</p>
                </div>
                <div class="stat-icon success">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-info">
                    <h3>{{ number_format($globalStats['total_views']) }}</h3>
                    <p>Vues totales</p>
                </div>
                <div class="stat-icon info">
                    <i class="fas fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-info">
                    <h3>{{ $globalStats['avg_articles_per_journalist'] }}</h3>
                    <p>Moyenne par journaliste</p>
                </div>
                <div class="stat-icon warning">
                    <i class="fas fa-chart-bar"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Top performers avec design sophistiqué -->
    <div class="top-performers">
        <div class="performer-card">
            <div class="performer-header">
                <h3><i class="fas fa-trophy"></i> Top Articles ({{ $globalStats['period_days'] }} derniers jours)</h3>
            </div>
            <div class="performer-list">
                @foreach($topByArticles as $index => $journalist)
                <div class="performer-item">
                    <div class="performer-rank">{{ $index + 1 }}</div>
                    <div class="performer-info">
                        <div class="performer-name">{{ $journalist->name }}</div>
                        <div class="performer-email">{{ $journalist->email }}</div>
                    </div>
                    <div class="performer-badge">{{ $journalist->recent_articles }} articles</div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="performer-card">
            <div class="performer-header">
                <h3><i class="fas fa-eye"></i> Top Vues ({{ $globalStats['period_days'] }} derniers jours)</h3>
            </div>
            <div class="performer-list">
                @foreach($topByViews as $index => $journalist)
                <div class="performer-item">
                    <div class="performer-rank">{{ $index + 1 }}</div>
                    <div class="performer-info">
                        <div class="performer-name">{{ $journalist->name }}</div>
                        <div class="performer-email">{{ $journalist->email }}</div>
                    </div>
                    <div class="performer-badge">{{ number_format($journalist->recent_views) }} vues</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Liste complète des journalistes avec design sophistiqué -->
    <div class="journalists-table-card">
        <div class="table-header">
            <h3><i class="fas fa-users"></i> Liste complète des journalistes</h3>
        </div>
        <div class="table-content">
            <div class="table-responsive">
                <table class="journalists-table">
                    <thead>
                        <tr>
                            <th>Journaliste</th>
                            <th>Email</th>
                            <th>Articles totaux</th>
                            <th>Vues totales</th>
                            <th>Moyenne vues/article</th>
                            <th>Articles récents</th>
                            <th>Vues récentes</th>
                            <th>Dernier article</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($journalists as $journalist)
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    <div class="journalist-avatar">
                                        {{ strtoupper(substr($journalist->name, 0, 1)) }}
                                    </div>
                                    <strong>{{ $journalist->name }}</strong>
                                </div>
                            </td>
                            <td>{{ $journalist->email }}</td>
                            <td>
                                <span class="metric-badge metric-primary">{{ $journalist->total_articles }}</span>
                            </td>
                            <td>
                                <span class="metric-badge metric-info">{{ number_format($journalist->total_views) }}</span>
                            </td>
                            <td>
                                <span class="metric-badge metric-warning">{{ number_format($journalist->avg_views_per_article, 1) }}</span>
                            </td>
                            <td>
                                <span class="metric-badge metric-primary">{{ $journalist->recent_articles }}</span>
                            </td>
                            <td>
                                <span class="metric-badge metric-success">{{ number_format($journalist->recent_views) }}</span>
                            </td>
                            <td>
                                @if($journalist->last_article_date)
                                    <small style="color: #6b7280;">
                                        {{ \Carbon\Carbon::parse($journalist->last_article_date)->diffForHumans() }}
                                    </small>
                                @else
                                    <small style="color: #6b7280;">Aucun</small>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('dashboard.journalists.show', $journalist->id) }}"
                                   class="action-btn"
                                   title="Voir les détails">
                                    <i class="fas fa-eye"></i>
                                    Voir détails
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" style="text-align: center; padding: 3rem;">
                                <i class="fas fa-users" style="font-size: 3rem; color: #d1d5db; margin-bottom: 1rem;"></i>
                                <p style="color: #6b7280; margin: 0;">Aucun journaliste trouvé</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection