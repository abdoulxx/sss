<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article nécessite des révisions</title>
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
            background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
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
            background: #fff3cd;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #ffc107;
        }
        .reason-box {
            background: #f8d7da;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #dc3545;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #ffc107;
            color: #212529;
            text-decoration: none;
            border-radius: 6px;
            margin: 15px 0;
            font-weight: 600;
        }
        .btn:hover {
            background-color: #e0a800;
        }
        .encouragement {
            background: #d1ecf1;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #17a2b8;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📋 Révisions Demandées</h1>
        <p>Votre article nécessite des modifications</p>
    </div>

    <div class="content">
        <h2>Bonjour {{ $author->name }},</h2>

        <p>Nous avons examiné votre article et souhaitons vous aider à l'améliorer avant publication.</p>

        <div class="article-info">
            <h3>📄 Article concerné :</h3>
            <p><strong>Titre :</strong> {{ $article->title }}</p>
            <p><strong>Catégorie :</strong> {{ $article->category->name ?? 'Non spécifiée' }}</p>
            <p><strong>Date de soumission :</strong> {{ $article->updated_at->format('d/m/Y à H:i') }}</p>
            @if($article->excerpt)
                <p><strong>Extrait :</strong> {{ Str::limit($article->excerpt, 200) }}</p>
            @endif
        </div>

        @if($reason)
            <div class="reason-box">
                <h3>📝 Commentaires et suggestions :</h3>
                <p>{{ $reason }}</p>
            </div>
        @else
            <div class="reason-box">
                <h3>📝 Commentaires :</h3>
                <p>Des modifications sont nécessaires pour améliorer la qualité de votre article. Veuillez consulter votre tableau de bord pour plus de détails ou contacter l'équipe éditoriale.</p>
            </div>
        @endif

        <div class="encouragement">
            <h3>💪 Ne vous découragez pas !</h3>
            <p>Cette étape fait partie du processus éditorial normal. Nous sommes là pour vous aider à créer le meilleur contenu possible.</p>
        </div>

        <div style="text-align: center;">
            <a href="{{ $dashboardUrl }}" class="btn">
                ✏️ Modifier mon article
            </a>
        </div>

        <h3>🔄 Prochaines étapes :</h3>
        <ul>
            <li>📖 Lisez attentivement les commentaires ci-dessus</li>
            <li>✏️ Apportez les modifications suggérées</li>
            <li>🔍 Relisez votre article après les modifications</li>
            <li>📤 Soumettez à nouveau votre article pour validation</li>
        </ul>

        <p style="margin-top: 30px;">
            <strong>Besoin d'aide ?</strong> N'hésitez pas à contacter l'équipe éditoriale si vous avez des questions sur les modifications demandées.
        </p>

        <p>
            <em>Nous apprécions votre contribution et avons hâte de publier votre article une fois amélioré !</em>
        </p>
    </div>

    <div class="footer">
        <p><strong>Excellence Afrik</strong> - Ensemble vers l'excellence</p>
        <p>Cet email a été envoyé automatiquement. Ne pas répondre à cet email.</p>
    </div>
</body>
</html>