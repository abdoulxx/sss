<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚨 Nouvelle Réservation Impact Féminin - Action Requise</title>
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
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #dc3545, #fd7e14);
            color: white;
            text-align: center;
            padding: 25px 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
        }
        .header .badge {
            background-color: rgba(255,255,255,0.2);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            margin-top: 10px;
            display: inline-block;
        }
        .content {
            padding: 30px;
        }
        .alert-urgent {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            border-left: 5px solid #fd7e14;
        }
        .reservation-info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #6A2BBF;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .data-table th, .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        .data-table th {
            background-color: #6c757d;
            color: white;
            font-weight: 600;
            width: 35%;
        }
        .data-table td {
            background-color: #fdfdfd;
        }
        .data-table tr:last-child td,
        .data-table tr:last-child th {
            border-bottom: none;
        }
        .action-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .action-list li {
            background-color: white;
            margin: 10px 0;
            padding: 12px 15px;
            border-radius: 6px;
            border-left: 4px solid #28a745;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .stats-box {
            display: inline-block;
            background-color: #17a2b8;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            margin: 5px;
        }
        .footer {
            background-color: #343a40;
            color: #adb5bd;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }
        .footer p {
            margin: 5px 0;
        }
        .priority-high {
            color: #dc3545;
            font-weight: 700;
        }
        .contact-info {
            background-color: #e7f3ff;
            padding: 15px;
            border-radius: 6px;
            margin: 10px 0;
            border-left: 3px solid #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚨 NOUVELLE RÉSERVATION REÇUE</h1>
            <div class="badge">Impact Féminin 2025 - Administration</div>
        </div>
        
        <div class="content">
            <div class="alert-urgent">
                <strong>⚡ ALERTE ADMINISTRATIVE :</strong> Une nouvelle réservation nécessite votre attention immédiate !
                <br><small>Reçue le {{ $reservation->created_at->format('d/m/Y à H:i:s') }}</small>
            </div>

            <div class="reservation-info">
                <h3>� INFORMATIONS RÉSERVATION #{{ $reservation->id }}</h3>
                <div class="stats-box">Type: {{ ucfirst($reservation->type_reservation) }}</div>
                <div class="stats-box">Société: {{ $reservation->societe }}</div>
            </div>

            <table class="data-table">
                <tr>
                    <th>ID Réservation</th>
                    <td><strong>#{{ $reservation->id }}</strong></td>
                </tr>
                <tr>
                    <th>Participant(e)</th>
                    <td><strong>{{ $reservation->prenom }} {{ $reservation->nom }}</strong></td>
                </tr>
                <tr>
                    <th>Entreprise</th>
                    <td>{{ $reservation->societe }}</td>
                </tr>
                <tr>
                    <th>Fonction</th>
                    <td>{{ $reservation->poste }}</td>
                </tr>
                <tr>
                    <th>Type de réservation</th>
                    <td>
                        @if($reservation->type_reservation == 'participant')
                            <span style="color: #28a745;">PARTICIPANT</span> - Assistance à l'événement
                        @elseif($reservation->type_reservation == 'sponsor')
                            <span style="color: #dc3545;">SPONSOR</span> - Partenaire financier
                        @elseif($reservation->type_reservation == 'exposant')
                            <span style="color: #6f42c1;">EXPOSANT</span> - Stand d'exposition
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>📅 Date réservation</th>
                    <td>{{ $reservation->created_at->format('d/m/Y à H:i') }}</td>
                </tr>
            </table>

            <div class="contact-info">
                <strong>📞 Coordonnées de contact :</strong><br>
                📧 Email : <a href="mailto:{{ $reservation->email }}">{{ $reservation->email }}</a><br>
                📱 Téléphone : {{ $reservation->telephone }}
            </div>

            <hr style="margin: 30px 0; border: 1px solid #e9ecef;">
        </div>
        
        <div class="footer">
            <p><strong>ACD CORPORATE SERVICES</strong></p>
            <p>Administration Impact Féminin | Gestion des Réservations</p>
            <p>&copy; {{ date('Y') }} - Système de notification automatique</p>
        </div>
    </div>
</body>
</html>
