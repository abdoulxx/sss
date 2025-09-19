<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'inscription - Rencontres Internationales 2026</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: 30px auto;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: #181818;
            color: white;
            text-align: center;
            padding: 40px 30px 30px 30px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            color: #EA4D28;
        }
        .header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 16px;
        }
        .content {
            padding: 40px 30px;
        }
        .welcome-message {
            background-color: #f8f9fa;
            border-left: 4px solid #EA4D28;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 30px;
        }
        .welcome-message h2 {
            color: #181818;
            margin: 0 0 10px 0;
            font-size: 20px;
        }
        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.08);
        }
        .summary-table th,
        .summary-table td {
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }
        .summary-table th {
            background-color: #f8f9fa;
            color: #333;
            font-weight: 600;
            width: 40%;
        }
        .summary-table td {
            background-color: white;
        }
        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 30px;
            color: #666;
            border-top: 1px solid #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Rencontres Internationales 2026</h1>
            <p>Confirmation de votre inscription</p>
        </div>
        <div class="content">
            <div class="welcome-message">
                <h2>Bonjour {{ $inscription->nom_prenom }} !</h2>
                <p>Nous avons bien reçu votre demande d'inscription pour les <strong>Rencontres Internationales B2B 2026</strong> et nous vous remercions de votre intérêt.</p>
            </div>
            <p>Voici un récapitulatif des informations que vous nous avez fournies :</p>
            <table class="summary-table">
                <tr>
                    <th>Nom & Prénom</th>
                    <td>{{ $inscription->nom_prenom }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $inscription->email }}</td>
                </tr>
                <tr>
                    <th>Téléphone</th>
                    <td>{{ $inscription->telephone }}</td>
                </tr>
                <tr>
                    <th>Société</th>
                    <td>{{ $inscription->entreprise ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Poste</th>
                    <td>{{ $inscription->fonction ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Pack choisi</th>
                    <td>{{ ucfirst($inscription->pack_choisi) }}</td>
                </tr>
                <tr>
                    <th>Destinations</th>
                    <td>{{ is_array($inscription->destinations) ? implode(', ', $inscription->destinations) : $inscription->destinations }}</td>
                </tr>
            </table>
            <p>Notre équipe examinera votre demande et vous contactera très prochainement pour finaliser les modalités.</p>
        </div>
        <div class="footer">
            <p><strong>Excellence Afrik</strong> - Promouvoir l'excellence</p>
            <p>&copy; {{ date('Y') }} Excellence Afrik. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>