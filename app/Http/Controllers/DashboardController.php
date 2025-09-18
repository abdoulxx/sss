<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class DashboardController extends Controller
{
    private ImageManager $imageManager;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->imageManager = new ImageManager(new Driver());
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->estJournaliste()) {
            return $this->journalistDashboard($user);
        } else {
            return $this->adminDashboard($user);
        }
    }

    /**
     * Dashboard for journalists.
     */
    private function journalistDashboard($user)
    {
        $stats = [
            'mes_articles_total' => Article::where('user_id', $user->id)->count(),
            'mes_articles_published' => Article::where('user_id', $user->id)->where('status', 'published')->count(),
            'mes_articles_pending' => Article::where('user_id', $user->id)->where('status', 'pending')->count(),
            'mes_articles_drafts' => Article::where('user_id', $user->id)->where('status', 'draft')->count(),
        ];

        $totalViews = Article::where('user_id', $user->id)->sum('view_count') ?: 0;
        $stats['mes_vues_totales'] = $totalViews;
        $stats['ma_moyenne_vues'] = $stats['mes_articles_total'] > 0 ? round($totalViews / $stats['mes_articles_total']) : 0;

        // Répartition des statuts pour les graphiques
        $repartitionStatuts = [
            'published' => $stats['mes_articles_published'],
            'pending' => $stats['mes_articles_pending'],
            'draft' => $stats['mes_articles_drafts'],
        ];

        $mesArticlesRecents = Article::with(['category'])->where('user_id', $user->id)->orderBy('created_at', 'desc')->limit(5)->get();
        $mesMeilleursArticles = Article::with(['category'])->where('user_id', $user->id)->where('status', 'published')->orderBy('view_count', 'desc')->limit(6)->get();

        return view('dashboard.journalist', compact('user', 'stats', 'repartitionStatuts', 'mesArticlesRecents', 'mesMeilleursArticles'));
    }

    /**
     * Dashboard for admins and directors.
     */
    private function adminDashboard($user)
    {
        $stats = [
            'articles_published' => Article::where('status', 'published')->count(),
            'articles_total' => Article::count(),
            'articles_pending' => Article::where('status', 'pending')->count(),
            'articles_drafts' => Article::where('status', 'draft')->count(),
            'users_total' => User::count(),
            'users_journalists' => User::where('role_utilisateur', 'journaliste')->count(),
            'categories_active' => Category::where('status', 'active')->count(),
        ];

        $recentArticles = Article::with(['user', 'category'])->orderBy('created_at', 'desc')->limit(5)->get();
        $topArticles = Article::with(['user', 'category'])->where('status', 'published')->orderBy('view_count', 'desc')->limit(6)->get();
        $activities = [];

        return view('dashboard.index', compact('user', 'stats', 'recentArticles', 'topArticles', 'activities'));
    }

    /**
     * Show articles management page.
     */
    public function articles()
    {
        $utilisateur = Auth::user();
        $articlesQuery = Article::with(['category', 'user']);

        if ($utilisateur->estJournaliste()) {
            // Journalists should see all their own articles, regardless of status
            $articlesQuery->where('user_id', $utilisateur->id);
        }
        // Admins and Directors will now see all articles, including drafts.

        $articles = $articlesQuery->orderBy('created_at', 'desc')->paginate(15); // Paginate with 15 articles per page
        return view('dashboard.articles', compact('articles'));
    }

    /**
     * Show create article page.
     */
    public function createArticle()
    {
        $categories = Category::where('status', 'active')->where('is_active', 1)->orderBy('name')->get();
        $parentCategories = $categories->whereNull('parent_id');
        $subcategories = $categories->whereNotNull('parent_id')->groupBy('parent_id');
        // The view also seems to need a flat list of all categories, so we pass it as 'categories'.
        return view('dashboard.articles.create', compact('categories', 'parentCategories', 'subcategories'));
    }

    /**
     * Store a new article.
     */
    public function storeArticle(Request $request)
    {
        $utilisateur = Auth::user();
        $statusValidation = 'required|in:draft,published' . ($utilisateur->estJournaliste() ? ',pending' : '');

        $validatedData = $request->validate([
            'title' => 'required|string|max:200',
            'slug' => 'nullable|string|max:255|unique:articles,slug',
            'category_id' => 'required|integer|exists:categories,id',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'status' => $statusValidation,
            'published_at' => 'nullable|date',
            'featured' => 'boolean',
            'sector' => 'nullable|string|max:50',
            'theme' => 'nullable|string|max:50',
            'tags' => 'nullable|string',
            'image_alt' => 'nullable|string|max:255'
        ]);

        $slug = $validatedData['slug'] ?: $this->generateSlug($validatedData['title']);

        $articleData = [
            'title' => $validatedData['title'],
            'slug' => $slug,
            'excerpt' => $validatedData['excerpt'],
            'content' => $validatedData['content'],
            'author_id' => Auth::id(),
            'user_id' => Auth::id(), // Assigner l'utilisateur connecté comme auteur
            'category_id' => $validatedData['category_id'],
            'seo_title' => $validatedData['meta_title'],
            'seo_description' => $validatedData['meta_description'],
            'status' => $validatedData['status'],
            'is_featured' => $validatedData['featured'] ?? false,
            'reading_time' => $this->calculateReadingTime($validatedData['content']),
            'sector' => $validatedData['sector'],
            'theme' => $validatedData['theme'],
            'tags' => $validatedData['tags'],
            'featured_image_alt' => $validatedData['image_alt'],
        ];

        if ($request->hasFile('featured_image')) {
            $articleData['featured_image_path'] = $this->processImage($request->file('featured_image'));
        }

        if ($validatedData['status'] === 'published') {
            $articleData['published_at'] = $validatedData['published_at'] ? \Carbon\Carbon::parse($validatedData['published_at']) : now();
        }

        $article = Article::create($articleData);

        if ($articleData['is_featured']) {
            $this->ensureFeaturedUniqueness($article->category_id, $article->id);
        }

        return redirect()->route('dashboard.articles')->with('success', 'Article créé avec succès.');
    }

    /**
     * Show edit article page.
     */
    public function editArticle($id)
    {
        $utilisateur = Auth::user();
        $article = Article::with('category')->findOrFail($id);

        if ($utilisateur->estJournaliste() && $article->author_id !== $utilisateur->id) {
            abort(403, 'Vous ne pouvez modifier que vos propres articles.');
        }

        $categories = Category::where('status', 'active')->orderBy('name')->get();
        return view('dashboard.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update an existing article.
     */
    public function updateArticle(Request $request, $id)
    {
        $utilisateur = Auth::user();
        $article = Article::findOrFail($id);

        if ($utilisateur->estJournaliste() && $article->author_id !== $utilisateur->id) {
            abort(403, 'Vous ne pouvez modifier que vos propres articles.');
        }

        $statusValidation = 'required|in:draft,published,archived,pending';

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => $statusValidation,
            'featured' => 'sometimes|boolean',
            'sector' => 'nullable|string|max:50',
            'theme' => 'nullable|string|max:50',
            'tags' => 'nullable|string',
            'meta_title' => 'nullable|string|max:60',
            'meta_description' => 'nullable|string|max:160',
            'image_alt' => 'nullable|string|max:255'
        ]);

        $slug = $article->slug;
        if ($request->title !== $article->title) {
            $slug = $this->generateSlug($request->title, $id);
        }

        $updateData = [
            'title' => $validatedData['title'],
            'slug' => $slug,
            'excerpt' => $validatedData['excerpt'],
            'content' => $validatedData['content'],
            'category_id' => $validatedData['category_id'],
            'status' => $validatedData['status'],
            'reading_time' => $this->calculateReadingTime($validatedData['content']),
            'is_featured' => $request->boolean('featured'),
            'sector' => $validatedData['sector'],
            'theme' => $validatedData['theme'],
            'tags' => $validatedData['tags'],
            'seo_title' => $validatedData['meta_title'],
            'seo_description' => $validatedData['meta_description'],
            'featured_image_alt' => $validatedData['image_alt'],
        ];

        if ($request->hasFile('featured_image')) {
            $updateData['featured_image_path'] = $this->processImage($request->file('featured_image'), $article->featured_image_path);
        }

        if ($updateData['is_featured']) {
            $this->ensureFeaturedUniqueness($updateData['category_id'], $id);
        }

        $article->update($updateData);

        return redirect()->route('dashboard.articles')->with('success', 'Article mis à jour avec succès !');
    }

    /**
     * Delete an article.
     */
    public function deleteArticle($id)
    {
        $utilisateur = Auth::user();
        $article = Article::findOrFail($id);

        if ($utilisateur->estJournaliste() && ($article->author_id !== $utilisateur->id || $article->status === 'published')) {
            return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer cet article.');
        }

        if ($article->featured_image_path) {
            Storage::disk('public')->delete($article->featured_image_path);
        }

        $article->delete();

        return redirect()->route('dashboard.articles')->with('success', 'Article supprimé avec succès !');
    }

    /**
     * Show categories management page.
     */
    public function categories()
    {
        $categories = \App\Models\Category::with('parent')->orderBy('name')->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show create category page.
     */
    public function createCategory()
    {
        $categories = \App\Models\Category::whereNull('parent_id')->orderBy('name')->get();
        return view('dashboard.categories.create', compact('categories'));
    }

    /**
     * Store a new category.
     */
    public function storeCategory(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string|max:500',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        if (empty($validatedData['slug'])) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
        }

        // Ajouter l'ID de l'utilisateur connecté
        $validatedData['user_id'] = Auth::id();

        \App\Models\Category::create($validatedData);

        return redirect()->route('dashboard.categories.index')->with('success', 'Catégorie créée avec succès !');
    }

    /**
     * Show edit category page.
     */
    public function editCategory($id)
    {
        $category = \App\Models\Category::findOrFail($id);
        $categories = \App\Models\Category::whereNull('parent_id')->where('id', '!=', $id)->orderBy('name')->get();
        return view('dashboard.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update an existing category.
     */
    public function updateCategory(Request $request, $id)
    {
        $category = \App\Models\Category::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $id,
            'description' => 'nullable|string|max:500',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        if (empty($validatedData['slug'])) {
            $validatedData['slug'] = Str::slug($validatedData['name']);
        }

        $category->update($validatedData);

        return redirect()->route('dashboard.categories.index')->with('success', 'Catégorie mise à jour avec succès !');
    }

    /**
     * Delete a category.
     */
    public function deleteCategory($id)
    {
        $category = \App\Models\Category::findOrFail($id);

        if ($category->articles()->count() > 0) {
            return redirect()->back()->with('error', 'Impossible de supprimer cette catégorie car des articles y sont rattachés.');
        }

        $category->delete();

        return redirect()->route('dashboard.categories.index')->with('success', 'Catégorie supprimée avec succès !');
    }

    private function processImage($file, $oldPath = null)
    {
        if ($oldPath) {
            // Also delete old thumbnail if it exists
            $thumbPath = str_replace('.', '_thumb.', $oldPath);
            Storage::disk('public')->delete($oldPath);
            Storage::disk('public')->delete($thumbPath);
        }

        $extension = $file->getClientOriginalExtension();
        $baseName = (string) Str::uuid();
        
        // Define paths for large and thumb images
        $largeFilename = $baseName . '.' . $extension;
        $thumbFilename = $baseName . '_thumb.' . $extension;
        $relativeLargePath = 'articles/' . $largeFilename;
        $relativeThumbPath = 'articles/' . $thumbFilename;
        $absoluteLargePath = storage_path('app/public/' . $relativeLargePath);
        $absoluteThumbPath = storage_path('app/public/' . $relativeThumbPath);

        // Create image instance
        $image = $this->imageManager->read($file->getRealPath());

        // Create and save large image (781x536)
        $image->cover(781, 536)->save($absoluteLargePath, 85);

        // Create and save thumbnail image (500x300)
        $image->cover(500, 300)->save($absoluteThumbPath, 85);

        // Return the path to the main (large) image
        return $relativeLargePath;
    }

    private function generateSlug($title, $excludeId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;
        $query = Article::where('slug', $slug);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }
        while ($query->exists()) {
            $slug = $originalSlug . '-' . $counter++;
            $query = Article::where('slug', $slug);
            if ($excludeId) {
                $query->where('id', '!=', $excludeId);
            }
        }
        return $slug;
    }

    private function calculateReadingTime($content)
    {
        return (int) max(1, ceil(str_word_count(strip_tags($content)) / 200));
    }

    private function ensureFeaturedUniqueness($categoryId, $articleId)
    {
        Article::where('category_id', $categoryId)->where('id', '!=', $articleId)->update(['is_featured' => 0]);
    }

    /**
     * Show users list for admin/director
     */
    public function users()
    {
        // Vérifier les permissions
        $user = Auth::user();
        if (!$user->estAdmin() && !$user->estDirecteurPublication()) {
            abort(403, 'Accès non autorisé');
        }

        $users = User::orderBy('created_at', 'desc')->paginate(15);

        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Get users list as JSON for API calls
     */
    public function getUsers()
    {
        // Vérifier les permissions
        $user = Auth::user();
        if (!$user->estAdmin() && !$user->estDirecteurPublication()) {
            return response()->json(['error' => 'Accès non autorisé'], 403);
        }

        $users = User::orderBy('created_at', 'desc')->get();

        return response()->json(['users' => $users]);
    }

    /**
     * Get specific user by ID
     */
    public function getUser($id)
    {
        // Vérifier les permissions
        $user = Auth::user();
        if (!$user->estAdmin() && !$user->estDirecteurPublication()) {
            return response()->json(['error' => 'Accès non autorisé'], 403);
        }

        $targetUser = User::findOrFail($id);
        return response()->json($targetUser);
    }

    /**
     * Create a new user
     */
    public function createUser(Request $request)
    {
        try {
            // Vérifier les permissions
            $currentUser = Auth::user();
            if (!$currentUser->estAdmin()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Seuls les administrateurs peuvent créer des utilisateurs'
                ], 403);
            }

            // Validation des données
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8',
                'role_utilisateur' => 'required|in:admin,directeur_publication,journaliste',
                'est_actif' => 'sometimes|boolean'
            ]);

            // Préparer les données pour la création
            $userData = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'role_utilisateur' => $validatedData['role_utilisateur'],
                'est_actif' => $request->has('est_actif') ? (bool)$request->input('est_actif') : true,
                'email_verified_at' => now(), // Marquer comme vérifié par défaut
            ];

            // Créer l'utilisateur
            $newUser = User::create($userData);

            return response()->json([
                'success' => true,
                'message' => 'Utilisateur créé avec succès',
                'user' => $newUser
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Erreur création utilisateur: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création de l\'utilisateur: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update existing user
     */
    public function updateUser(Request $request, $id)
    {
        try {
            // Vérifier les permissions
            $currentUser = Auth::user();
            if (!$currentUser->estAdmin() && !$currentUser->estDirecteurPublication()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Accès non autorisé'
                ], 403);
            }

            $targetUser = User::findOrFail($id);

            // Seuls les admins peuvent modifier d'autres admins ou directeurs
            if (($targetUser->estAdmin() || $targetUser->estDirecteurPublication()) && !$currentUser->estAdmin()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Seuls les administrateurs peuvent modifier les comptes administrateurs'
                ], 403);
            }

            // Règles de validation
            $validationRules = [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'role_utilisateur' => 'required|in:admin,directeur_publication,journaliste',
                'est_actif' => 'sometimes|boolean'
            ];

            // Ajouter validation password si fourni
            if ($request->filled('password')) {
                $validationRules['password'] = 'string|min:8';
            }

            $validatedData = $request->validate($validationRules);

            // Préparer les données de mise à jour
            $updateData = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'role_utilisateur' => $validatedData['role_utilisateur'],
                'est_actif' => $request->has('est_actif') ? (bool)$request->input('est_actif') : $targetUser->est_actif,
            ];

            // Ajouter le mot de passe s'il est fourni
            if ($request->filled('password')) {
                $updateData['password'] = bcrypt($validatedData['password']);
            }

            $targetUser->update($updateData);

            return response()->json([
                'success' => true,
                'message' => 'Utilisateur modifié avec succès',
                'user' => $targetUser->fresh()
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Erreur modification utilisateur: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la modification de l\'utilisateur: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete user
     */
    public function deleteUser($id)
    {
        // Vérifier les permissions
        $currentUser = Auth::user();
        if (!$currentUser->estAdmin()) {
            return response()->json(['error' => 'Seuls les administrateurs peuvent supprimer des utilisateurs'], 403);
        }

        $targetUser = User::findOrFail($id);

        // Empêcher l'auto-suppression
        if ($targetUser->id === $currentUser->id) {
            return response()->json(['error' => 'Vous ne pouvez pas supprimer votre propre compte'], 400);
        }

        // Vérifier s'il y a des articles liés
        $articlesCount = Article::where('user_id', $targetUser->id)->count();
        if ($articlesCount > 0) {
            return response()->json([
                'error' => "Impossible de supprimer cet utilisateur car il a $articlesCount article(s) associé(s)"
            ], 400);
        }

        $targetUser->delete();

        return response()->json([
            'success' => true,
            'message' => 'Utilisateur supprimé avec succès'
        ]);
    }
}
