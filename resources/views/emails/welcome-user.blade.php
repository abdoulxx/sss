<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue sur Excellence Afrik</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .email-container {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .header {
            background: linear-gradient(135deg, #c1933e 0%, #f4c700 100%);
            padding: 40px 30px;
            text-align: center;
            color: #000;
        }
        .header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
            text-shadow: none;
        }
        .header p {
            margin: 10px 0 0 0;
            font-size: 16px;
            opacity: 0.9;
            font-weight: 500;
        }
        .content {
            background: white;
            padding: 40px 30px;
        }
        .welcome-message {
            text-align: center;
            margin-bottom: 30px;
        }
        .welcome-message h2 {
            color: #1a1a1a;
            font-size: 24px;
            margin-bottom: 15px;
            font-weight: 600;
        }
        .credentials-box {
            background: #ffffff;
            border: 2px solid #e9ecef;
            padding: 30px;
            margin: 25px 0;
            border-radius: 8px;
        }
        .credentials-box h3 {
            color: #333333;
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 18px;
            font-weight: 600;
            text-align: center;
        }
        .credential-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 6px;
            line-height: 1.2;
        }
        .credential-label {
            font-weight: 600;
            color: #333333;
            font-size: 14px;
            flex-shrink: 0;
            margin-right: 15px;
        }
        .credential-value {
            font-family: 'Courier New', monospace;
            background: #333333;
            padding: 8px 15px;
            border-radius: 4px;
            color: #ffffff;
            font-weight: 600;
            text-decoration: none !important;
            border: none;
            word-break: break-all;
        }
        .role-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: center;
            margin: 0;
        }
        .role-admin { background: #dc3545; color: white; }
        .role-directeur { background: #fd7e14; color: white; }
        .role-journaliste { background: #198754; color: white; }

        .login-button {
            text-align: center;
            margin: 35px 0;
        }
        .btn-login {
            display: inline-block;
            background: linear-gradient(135deg, #c1933e 0%, #f4c700 100%);
            color: #000;
            text-decoration: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(193, 147, 62, 0.4);
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(193, 147, 62, 0.6);
            text-decoration: none;
            color: #000;
        }
        .info-section {
            background: #e3f2fd;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
            border-left: 5px solid #2196f3;
        }
        .info-section h4 {
            color: #1565c0;
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: 600;
        }
        .info-section ul {
            margin: 0;
            padding-left: 20px;
        }
        .info-section li {
            margin-bottom: 8px;
            color: #0277bd;
        }
        .footer {
            background: #1a1a1a;
            color: #c1933e;
            text-align: center;
            padding: 30px;
            font-size: 14px;
        }
        .footer a {
            color: #f4c700;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #c1933e, transparent);
            margin: 25px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>EXCELLENCE AFRIK</h1>
            <p>Plateforme Éditoriale Africaine</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="welcome-message">
                <h2>🎉 Bienvenue {{ $user->name }} !</h2>
                <p>Nous sommes ravis de vous accueillir dans l'équipe Excellence Afrik. Votre compte a été créé avec succès et vous pouvez maintenant accéder à notre plateforme éditoriale.</p>
            </div>

            <div class="divider"></div>

            <!-- Credentials -->
            <div class="credentials-box">
                <h3>🔐 Vos informations de connexion</h3>
                <div class="credential-item">
                    <span class="credential-label">Email :</span>
                    <span class="credential-value" style="color: #ffffff !important; text-decoration: none !important;">{{ $user->email }}</span>
                </div>
                <div class="credential-item">
                    <span class="credential-label">Mot de passe :</span>
                    <span class="credential-value">{{ $password }}</span>
                </div>
                <div class="credential-item">
                    <span class="credential-label">Rôle :</span>
                    <div class="role-badge role-{{ str_replace('_', '-', $user->role_utilisateur) }}">
                        {{ $roleLabels[$user->role_utilisateur] ?? $user->role_utilisateur }}
                    </div>
                </div>
            </div>

            <!-- Login Button -->
            <div class="login-button">
                <a href="{{ $loginUrl }}" class="btn-login">
                    🚀 Se Connecter Maintenant
                </a>
            </div>

            <!-- Role Information -->
            <div class="info-section">
                <h4>📋 Vos permissions en tant que {{ $roleLabels[$user->role_utilisateur] ?? $user->role_utilisateur }}</h4>
                <ul>
                    @if($user->role_utilisateur === 'admin')
                        <li>Gestion complète des utilisateurs</li>
                        <li>Modération de tous les contenus</li>
                        <li>Accès aux paramètres système</li>
                        <li>Gestion des publicités et newsletters</li>
                    @elseif($user->role_utilisateur === 'directeur_publication')
                        <li>Validation et publication des articles</li>
                        <li>Gestion de l'équipe éditoriale</li>
                        <li>Programmation WebTV</li>
                        <li>Modération des contenus</li>
                    @else
                        <li>Rédaction et soumission d'articles</li>
                        <li>Gestion de vos publications</li>
                        <li>Participation aux projets WebTV</li>
                        <li>Accès aux outils éditoriaux</li>
                    @endif
                </ul>
            </div>

            <div class="divider"></div>

            <p style="text-align: center; color: #6c757d; font-style: italic;">
                💡 <strong>Conseil :</strong> Nous vous recommandons de changer votre mot de passe lors de votre première connexion pour des raisons de sécurité.
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>
                <strong>Excellence Afrik</strong><br>
                Plateforme Éditoriale Africaine<br>
                <a href="https://excellenceafrik.com">https://excellenceafrik.com</a>
            </p>
            <p style="margin-top: 15px; font-size: 12px; opacity: 0.8;">
                © {{ date('Y') }} Excellence Afrik. Tous droits réservés.
            </p>
        </div>
    </div>
</body>
</html>