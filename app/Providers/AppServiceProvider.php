<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Article;
use App\Models\Advertisement;
use App\Observers\ArticleObserver;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        // Forcer la locale pour les dates
        App::setLocale(config('app.locale'));
        Carbon::setLocale(config('app.locale'));

        // Enregistrer l'observer pour le modèle Article
        Article::observe(ArticleObserver::class);

        // Partager les publicités avec les layouts appropriés
        View::composer('layouts.app', function ($view) {
            try {
                // Bannière haute pour toutes les pages
                $bannerTop = Advertisement::active()
                    ->forPosition('home', null, 'home_top_banner')
                    ->first();

                $view->with('bannerTop', $bannerTop);
            } catch (\Exception $e) {
                // En cas d'erreur, ne pas afficher de publicité
                $view->with('bannerTop', null);
            }
        });

        // Publicité milieu de page pour l'accueil
        View::composer('home', function ($view) {
            try {
                $homeMiddleAd = Advertisement::active()
                    ->forPosition('home', null, 'home_middle_section')
                    ->first();

                $view->with('homeMiddleAd', $homeMiddleAd);
            } catch (\Exception $e) {
                $view->with('homeMiddleAd', null);
            }
        });

        // Publicité sidebar pour les articles
        View::composer('articles.show', function ($view) {
            try {
                $articleSidebarAd = Advertisement::active()
                    ->forPosition('article', null, 'article_sidebar')
                    ->first();

                $view->with('articleSidebarAd', $articleSidebarAd);
            } catch (\Exception $e) {
                $view->with('articleSidebarAd', null);
            }
        });

        // Publicité avant footer pour WebTV
        View::composer('pages.webtv', function ($view) {
            try {
                $webtvBeforeFooterAd = Advertisement::active()
                    ->forPosition('webtv', null, 'webtv_before_footer')
                    ->first();

                $view->with('webtvBeforeFooterAd', $webtvBeforeFooterAd);
            } catch (\Exception $e) {
                $view->with('webtvBeforeFooterAd', null);
            }
        });
    }
}
