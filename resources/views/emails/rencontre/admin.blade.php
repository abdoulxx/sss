<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Inscription - Rencontres 2026</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            width: 90%;
            max-width: 650px;
            margin: 20px auto;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: #181818;
            color: white;
            text-align: center;
            padding: 25px 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
            color: #EA4D28;
        }
        .content {
            padding: 30px;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .data-table th,
        .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        .data-table th {
            background-color: #f8f9fa;
            font-weight: 600;
            width: 35%;
        }
        .footer {
            background-color: #343a40;
            color: #adb5bd;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nouvelle Inscription</h1>
        </div>
        <div class="content">
            <p>Une nouvelle inscription pour les <strong>Rencontres Internationales 2026</strong> a été reçue.</p>
            <h3>Détails de l'inscription :</h3>
            <table class="data-table">
                <tr>
                    <th>ID Inscription</th>
                    <td>#{{ $inscription->id }}</td>
                </tr>
                <tr>
                    <th>Nom & Prénom</th>
                    <td><strong>{{ $inscription->nom_prenom }}</strong></td>
                </tr>
                <tr>
                    <th>Entreprise</th>
                    <td>{{ $inscription->entreprise ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Fonction</th>
                    <td>{{ $inscription->fonction ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><a href="mailto:{{ $inscription->email }}">{{ $inscription->email }}</a></td>
                </tr>
                <tr>
                    <th>Téléphone</th>
                    <td>{{ $inscription->telephone }}</td>
                </tr>
                <tr>
                    <th>Pack Choisi</th>
                    <td>{{ ucfirst($inscription->pack_choisi) }}</td>
                </tr>
                <tr>
                    <th>Destinations</th>
                    <td>{{ is_array($inscription->destinations) ? implode(', ', $inscription->destinations) : $inscription->destinations }}</td>
                </tr>
                <tr>
                    <th>Date de soumission</th>
                    <td>{{ $inscription->created_at->format('d/m/Y à H:i') }}</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Notification du système Excellence Afrik</p>
        </div>
    </div>
</body>
</html>