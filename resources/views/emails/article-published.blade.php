<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article publié</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #ffffff;
            padding: 30px;
            border: 1px solid #e1e5e9;
            border-top: none;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            border: 1px solid #e1e5e9;
            border-top: none;
            border-radius: 0 0 10px 10px;
            font-size: 14px;
            color: #6c757d;
        }
        .article-info {
            background: #d4edda;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #28a745;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin: 15px 0;
            font-weight: 600;
        }
        .btn:hover {
            background-color: #218838;
        }
        .congratulations {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
            border: 1px solid #ffeaa7;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎉 Félicitations !</h1>
        <p>Votre article a été publié avec succès</p>
    </div>

    <div class="content">
        <h2>Bonjour {{ $author->name }},</h2>

        <div class="congratulations">
            <h3>🌟 Excellente nouvelle !</h3>
            <p>Votre article a été approuvé et est maintenant <strong>publié</strong> sur Excellence Afrik.</p>
        </div>

        <div class="article-info">
            <h3>📄 Votre article publié :</h3>
            <p><strong>Titre :</strong> {{ $article->title }}</p>
            <p><strong>Catégorie :</strong> {{ $article->category->name ?? 'Non spécifiée' }}</p>
            <p><strong>Date de publication :</strong> {{ $article->published_at ? $article->published_at->format('d/m/Y à H:i') : $article->updated_at->format('d/m/Y à H:i') }}</p>
            @if($article->excerpt)
                <p><strong>Extrait :</strong> {{ Str::limit($article->excerpt, 200) }}</p>
            @endif
        </div>

        <p>Votre contenu est maintenant visible par tous les visiteurs d'Excellence Afrik. Nous vous remercions pour votre contribution de qualité à notre plateforme.</p>

        <div style="text-align: center;">
            <a href="{{ $articleUrl }}" class="btn">
                👁️ Voir l'article publié
            </a>
        </div>

        <h3>📊 Prochaines étapes :</h3>
        <ul>
            <li>🔗 Partagez votre article sur les réseaux sociaux</li>
            <li>📈 Suivez les statistiques de lecture dans votre tableau de bord</li>
            <li>✍️ Continuez à créer du contenu de qualité</li>
            <li>💬 Interagissez avec les commentaires de vos lecteurs</li>
        </ul>

        <p style="margin-top: 30px;">
            <em>Nous sommes fiers de compter sur des contributeurs comme vous pour enrichir notre plateforme !</em>
        </p>
    </div>

    <div class="footer">
        <p><strong>Excellence Afrik</strong> - Votre voix compte</p>
        <p>Cet email a été envoyé automatiquement. Ne pas répondre à cet email.</p>
    </div>
</body>
</html>