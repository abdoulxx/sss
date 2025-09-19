<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue dans la communauté Excellence Afrik</title>
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
            background: linear-gradient(135deg, #c1933e 0%, #F2CB05 100%);
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
            font-size: 28px;
            margin-bottom: 15px;
            font-weight: 700;
        }
        .welcome-message p {
            color: #6c757d;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 0;
        }
        .benefits-section {
            margin: 30px 0;
        }
        .benefits-title {
            color: #1a1a1a;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }
        .benefits-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }
        .benefit-item {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            border: 1px solid #e9ecef;
        }
        .benefit-icon {
            font-size: 24px;
            margin-bottom: 10px;
            color: #F2CB05;
        }
        .benefit-title {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 8px;
        }
        .benefit-description {
            font-size: 14px;
            color: #6c757d;
            line-height: 1.4;
        }
        .cta-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            margin: 30px 0;
        }
        .cta-title {
            color: white;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .cta-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        .cta-link {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 12px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.3);
        }
        .cta-link:hover {
            background: rgba(255,255,255,0.3);
            color: white;
            text-decoration: none;
        }
        .footer {
            background: #1a1a1a;
            color: #ccc;
            padding: 30px;
            text-align: center;
        }
        .footer-logo {
            color: #F2CB05;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .footer-description {
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 20px;
            opacity: 0.8;
        }
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        .footer-link {
            color: #F2CB05;
            text-decoration: none;
            font-size: 14px;
            transition: opacity 0.3s ease;
        }
        .footer-link:hover {
            opacity: 0.8;
            color: #F2CB05;
            text-decoration: none;
        }
        .unsubscribe {
            font-size: 12px;
            color: #888;
            margin-top: 15px;
        }
        .unsubscribe a {
            color: #F2CB05;
            text-decoration: none;
        }
        .source-badge {
            display: inline-block;
            background: #e9ecef;
            color: #495057;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
            text-transform: uppercase;
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            .header {
                padding: 30px 20px;
            }
            .header h1 {
                font-size: 24px;
            }
            .content {
                padding: 30px 20px;
            }
            .benefits-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            .cta-links {
                flex-direction: column;
                align-items: center;
            }
            .cta-link {
                width: 100%;
                max-width: 200px;
            }
            .footer-links {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>Excellence Afrik</h1>
            <p>Le magazine panafricain de l'excellence économique</p>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Welcome Message -->
            <div class="welcome-message">
                <h2>🎉 Bienvenue dans notre communauté !</h2>
                <p>
                    Merci de vous être abonné(e) à la newsletter Excellence Afrik.
                    Vous faites maintenant partie d'une communauté de leaders, d'entrepreneurs
                    et de passionnés qui façonnent l'avenir économique de l'Afrique.
                </p>
            </div>

            <!-- Benefits Section -->
            <div class="benefits-section">
                <h3 class="benefits-title">Ce que vous allez recevoir :</h3>
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <div class="benefit-icon">📰</div>
                        <div class="benefit-title">Actualités exclusives</div>
                        <div class="benefit-description">Les dernières nouvelles économiques du continent africain</div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">👥</div>
                        <div class="benefit-title">Portraits d'entrepreneurs</div>
                        <div class="benefit-description">Découvrez les leaders qui transforment l'Afrique</div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">📊</div>
                        <div class="benefit-title">Analyses approfondies</div>
                        <div class="benefit-description">Des insights sur les tendances économiques africaines</div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">📱</div>
                        <div class="benefit-title">Excellence WebTV</div>
                        <div class="benefit-description">Contenus vidéo exclusifs et programmes spéciaux</div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="cta-section">
                <h3 class="cta-title">Découvrez dès maintenant :</h3>
                <div class="cta-links">
                    <a href="{{ $websiteUrl }}" class="cta-link">
                        🏠 Notre site web
                    </a>
                    <a href="{{ $websiteUrl }}/articles/category/actualite-du-jour" class="cta-link">
                        📖 Nos articles
                    </a>
                    <a href="{{ $websiteUrl }}/webtv" class="cta-link">
                        📺 Excellence WebTV
                    </a>
                    <a href="{{ $websiteUrl }}/magazines" class="cta-link">
                        📚 Nos magazines
                    </a>
                </div>
            </div>

            <div style="text-align: center; margin: 30px 0; color: #6c757d;">
                <p>
                    <strong>Fréquence d'envoi :</strong> Nous vous enverrons nos meilleures actualités
                    et analyses de façon régulière, sans jamais encombrer votre boîte email.
                </p>
                <p style="font-size: 14px;">
                    Vos données sont protégées et ne seront jamais partagées avec des tiers.
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-logo">Excellence Afrik</div>
            <div class="footer-description">
                Le premier magazine panafricain entièrement consacré aux entreprises non cotées,
                en particulier les TPE, PME et startups opérant sur le terrain.
            </div>

            <div class="footer-links">
                <a href="{{ $websiteUrl }}" class="footer-link">Site web</a>
                <a href="{{ $websiteUrl }}/pages/contact" class="footer-link">Contact</a>
                <a href="{{ $websiteUrl }}/pages/privacy" class="footer-link">Confidentialité</a>
                <a href="{{ $websiteUrl }}/pages/legal" class="footer-link">Mentions légales</a>
            </div>

            <div class="unsubscribe">
                <p>
                    Vous recevez cet email car vous vous êtes abonné(e) à notre newsletter.<br>
                    <a href="{{ $unsubscribeUrl }}">Se désabonner</a> |
                    <a href="{{ $websiteUrl }}">Visitez notre site</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>