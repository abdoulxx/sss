<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JournalistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verifier.role:admin,directeur_publication');
    }

    /**
     * Affichage de la liste des journalistes avec leurs statistiques
     */
    public function index(Request $request)
    {
        // Période de filtrage (par défaut les 30 derniers jours)
        $period = $request->get('period', '30');
        $startDate = Carbon::now()->subDays((int)$period);

        // Récupérer tous les utilisateurs qui ont publié au moins un article
        $journalists = User::select(
                'users.id',
                'users.name',
                'users.email',
                'users.role_utilisateur',
                'users.est_actif',
                'users.created_at',
                'users.updated_at',
                'users.derniere_connexion'
            )
            ->selectRaw('COUNT(articles.id) as total_articles')
            ->selectRaw('SUM(articles.view_count) as total_views')
            ->selectRaw('COUNT(CASE WHEN articles.created_at >= ? THEN 1 END) as recent_articles', [$startDate])
            ->selectRaw('SUM(CASE WHEN articles.created_at >= ? THEN articles.view_count ELSE 0 END) as recent_views', [$startDate])
            ->selectRaw('AVG(articles.view_count) as avg_views_per_article')
            ->selectRaw('MAX(articles.created_at) as last_article_date')
            ->leftJoin('articles', 'users.id', '=', 'articles.user_id')
            ->where('articles.status', 'published')
            ->groupBy(
                'users.id',
                'users.name',
                'users.email',
                'users.role_utilisateur',
                'users.est_actif',
                'users.created_at',
                'users.updated_at',
                'users.derniere_connexion'
            )
            ->orderByDesc('total_articles')
            ->get();

        // Statistiques globales
        $globalStats = [
            'total_journalists' => $journalists->count(),
            'total_articles' => $journalists->sum('total_articles'),
            'total_views' => $journalists->sum('total_views'),
            'avg_articles_per_journalist' => $journalists->count() > 0 ? round($journalists->sum('total_articles') / $journalists->count(), 1) : 0,
            'period_days' => $period
        ];

        // Top performers
        $topByArticles = $journalists->sortByDesc('recent_articles')->take(5);
        $topByViews = $journalists->sortByDesc('recent_views')->take(5);

        return view('dashboard.journalists.index', compact(
            'journalists',
            'globalStats',
            'topByArticles',
            'topByViews',
            'period'
        ));
    }

    /**
     * Détails d'un journaliste spécifique
     */
    public function show(User $user, Request $request)
    {
        // Période de filtrage
        $period = $request->get('period', '30');
        $startDate = Carbon::now()->subDays((int)$period);

        // Articles du journaliste
        $articles = Article::where('user_id', $user->id)
            ->where('status', 'published')
            ->when($request->get('period'), function($query) use ($startDate) {
                return $query->where('created_at', '>=', $startDate);
            })
            ->orderByDesc('created_at')
            ->paginate(10);

        // Statistiques détaillées
        $stats = [
            'total_articles' => Article::where('user_id', $user->id)->where('status', 'published')->count(),
            'total_views' => Article::where('user_id', $user->id)->where('status', 'published')->sum('view_count'),
            'recent_articles' => Article::where('user_id', $user->id)->where('status', 'published')->where('created_at', '>=', $startDate)->count(),
            'recent_views' => Article::where('user_id', $user->id)->where('status', 'published')->where('created_at', '>=', $startDate)->sum('view_count'),
            'avg_views' => Article::where('user_id', $user->id)->where('status', 'published')->avg('view_count'),
            'most_viewed_article' => Article::where('user_id', $user->id)->where('status', 'published')->orderByDesc('view_count')->first(),
            'articles_by_month' => $this->getArticlesByMonth($user->id, 12),
            'views_by_month' => $this->getViewsByMonth($user->id, 12)
        ];

        return view('dashboard.journalists.show', compact('user', 'articles', 'stats', 'period'));
    }

    /**
     * Obtenir le nombre d'articles par mois
     */
    private function getArticlesByMonth($userId, $months = 12)
    {
        return Article::where('user_id', $userId)
            ->where('status', 'published')
            ->where('created_at', '>=', Carbon::now()->subMonths($months))
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->map(function($item) {
                return [
                    'period' => Carbon::createFromDate($item->year, $item->month, 1)->translatedFormat('M Y'),
                    'count' => $item->count
                ];
            });
    }

    /**
     * Obtenir le nombre de vues par mois
     */
    private function getViewsByMonth($userId, $months = 12)
    {
        return Article::where('user_id', $userId)
            ->where('status', 'published')
            ->where('created_at', '>=', Carbon::now()->subMonths($months))
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(view_count) as views')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->map(function($item) {
                return [
                    'period' => Carbon::createFromDate($item->year, $item->month, 1)->translatedFormat('M Y'),
                    'views' => $item->views ?: 0
                ];
            });
    }

    /**
     * Export des statistiques (future fonctionnalité)
     */
    public function export(Request $request)
    {
        // TODO: Implémentation future pour l'export Excel/CSV
        return response()->json(['message' => 'Fonctionnalité à venir']);
    }
}