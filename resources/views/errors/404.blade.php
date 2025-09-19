<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée - Excellence Afrik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #D4AF37;
            --secondary-color: #F2CB05;
            --accent-color: #f59e0b;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --info-color: #06b6d4;
            --dark-color: #1f2937;
            --light-color: #f8fafc;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
        }

        body {
            background: linear-gradient(135deg, var(--dark-color) 0%, var(--primary-color) 100%);
            min-height: 100vh;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .error-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .error-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            padding: 3rem;
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        .error-icon {
            font-size: 6rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        .error-title {
            font-size: 3rem;
            font-weight: 800;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }

        .error-subtitle {
            font-size: 1.25rem;
            color: var(--gray-500);
            margin-bottom: 2rem;
        }

        .error-message {
            color: var(--gray-700);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .btn-return {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            margin: 0.5rem;
        }

        .btn-return:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            color: white;
            text-decoration: none;
        }

        .btn-secondary {
            background: var(--gray-500);
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            margin: 0.5rem;
            border: none;
        }

        .btn-secondary:hover {
            background: var(--gray-600);
            transform: translateY(-2px);
            color: white;
            text-decoration: none;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem auto;
            font-size: 2rem;
            color: white;
            font-weight: bold;
        }

        .suggestions {
            background: var(--light-color);
            border-radius: 15px;
            padding: 1.5rem;
            margin-top: 2rem;
            text-align: left;
        }

        .suggestions h5 {
            color: var(--dark-color);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .suggestions ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .suggestions li {
            padding: 0.5rem 0;
            color: var(--gray-700);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .suggestions li i {
            color: var(--primary-color);
            width: 20px;
        }

        @media (max-width: 768px) {
            .error-card {
                padding: 2rem;
                margin: 1rem;
            }

            .error-title {
                font-size: 2rem;
            }

            .error-icon {
                font-size: 4rem;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-card">
            <div class="logo">EA</div>

            <div class="error-icon">
                <i class="fas fa-search"></i>
            </div>

            <h1 class="error-title">404</h1>
            <h2 class="error-subtitle">Page non trouvée</h2>

            <p class="error-message">
                Oups ! La page que vous recherchez semble s'être perdue dans les méandres d'Internet.
                Mais ne vous inquiétez pas, nous allons vous aider à retrouver votre chemin.
            </p>

            <div class="mt-4">
                @auth
                    @switch(auth()->user()->role_utilisateur)
                        @case('admin')
                            <a href="{{ route('dashboard.index') }}" class="btn-return">
                                <i class="fas fa-tachometer-alt"></i>
                                Retour au Dashboard Admin
                            </a>
                            <a href="{{ route('dashboard.users.index') }}" class="btn-secondary">
                                <i class="fas fa-users"></i>
                                Gestion Utilisateurs
                            </a>
                            @break

                        @case('directeur')
                            <a href="{{ route('dashboard.index') }}" class="btn-return">
                                <i class="fas fa-tachometer-alt"></i>
                                Retour au Dashboard Directeur
                            </a>
                            <a href="{{ route('dashboard.articles') }}" class="btn-secondary">
                                <i class="fas fa-newspaper"></i>
                                Gestion Articles
                            </a>
                            @break

                        @case('journaliste')
                            <a href="{{ route('dashboard.mes-articles') }}" class="btn-return">
                                <i class="fas fa-pen"></i>
                                Mes Articles
                            </a>
                            <a href="{{ route('dashboard.articles.create') }}" class="btn-secondary">
                                <i class="fas fa-plus"></i>
                                Nouvel Article
                            </a>
                            @break

                        @default
                            <a href="{{ route('dashboard.index') }}" class="btn-return">
                                <i class="fas fa-tachometer-alt"></i>
                                Retour au Dashboard
                            </a>
                    @endswitch
                @else
                    <a href="{{ route('home') }}" class="btn-return">
                        <i class="fas fa-home"></i>
                        Retour à l'Accueil
                    </a>
                    <a href="{{ route('login') }}" class="btn-secondary">
                        <i class="fas fa-sign-in-alt"></i>
                        Se Connecter
                    </a>
                @endauth
            </div>

            <div class="suggestions">
                <h5>
                    <i class="fas fa-lightbulb"></i>
                    Suggestions :
                </h5>
                <ul>
                    @auth
                        @if(auth()->user()->role_utilisateur === 'admin')
                            <li><i class="fas fa-cog"></i> Gérer les paramètres du site</li>
                            <li><i class="fas fa-users"></i> Administrer les utilisateurs</li>
                            <li><i class="fas fa-chart-bar"></i> Consulter les statistiques</li>
                        @elseif(auth()->user()->role_utilisateur === 'directeur')
                            <li><i class="fas fa-eye"></i> Superviser le contenu éditorial</li>
                            <li><i class="fas fa-check-circle"></i> Valider les publications</li>
                            <li><i class="fas fa-calendar"></i> Planifier la publication</li>
                        @elseif(auth()->user()->role_utilisateur === 'journaliste')
                            <li><i class="fas fa-edit"></i> Rédiger un nouvel article</li>
                            <li><i class="fas fa-folder"></i> Consulter vos brouillons</li>
                            <li><i class="fas fa-camera"></i> Ajouter des médias à vos articles</li>
                        @endif
                    @else
                        <li><i class="fas fa-newspaper"></i> Découvrir nos derniers articles</li>
                        <li><i class="fas fa-tv"></i> Regarder Excellence WebTV</li>
                        <li><i class="fas fa-envelope"></i> S'abonner à notre newsletter</li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>