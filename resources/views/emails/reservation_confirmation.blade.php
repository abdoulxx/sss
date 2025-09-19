<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation Impact Féminin</title>
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
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #6A2BBF, #E640A2);
            color: white;
            text-align: center;
            padding: 40px 30px 30px 30px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
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
            border-left: 4px solid #E640A2;
            padding: 20px;
            border-radius: 0 8px 8px 0;
            margin-bottom: 30px;
        }
        .welcome-message h2 {
            color: #6A2BBF;
            margin: 0 0 10px 0;
            font-size: 20px;
        }
        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
        }
        .summary-table th, .summary-table td {
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
        .summary-table tr:last-child td,
        .summary-table tr:last-child th {
            border-bottom: none;
        }
        .signature {
            text-align: right;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
            font-style: italic;
            color: #666;
        }
        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 30px;
            color: #666;
            border-top: 1px solid #e9ecef;
        }
        .footer p {
            margin: 0;
        }
        .reservation-badge {
            display: inline-block;
            background: linear-gradient(135deg, #6A2BBF, #E640A2);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎫 Réservation Impact Féminin</h1>
            <p>Confirmation de réception</p>
        </div>
        
        <div class="content">
            <div class="welcome-message">
                <h2>Bonjour {{ $reservation->prenom }} ! 👋</h2>
                <p>Nous avons bien reçu votre réservation pour l'événement <strong>Impact Féminin</strong> et nous vous remercions sincèrement de votre participation à cette initiative.</p>
            </div>

            <p>Voici un récapitulatif de votre réservation :</p>

            <table class="summary-table">
                <tr>
                    <th>Prénom</th>
                    <td>{{ $reservation->prenom }}</td>
                </tr>
                <tr>
                    <th>Nom</th>
                    <td>{{ $reservation->nom }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $reservation->email }}</td>
                </tr>
                <tr>
                    <th>Téléphone</th>
                    <td>{{ $reservation->telephone }}</td>
                </tr>
                <tr>
                    <th>Société</th>
                    <td>{{ $reservation->societe }}</td>
                </tr>
                <tr>
                    <th>Poste</th>
                    <td>{{ $reservation->poste }}</td>
                </tr>
                <tr>
                    <th>Type de réservation</th>
                    <td>
                        <span class="reservation-badge">
                            @if($reservation->type_reservation == 'participant')
                                Participant
                            @elseif($reservation->type_reservation == 'sponsor')
                                Sponsor  
                            @elseif($reservation->type_reservation == 'exposant')
                                Exposant
                            @endif
                        </span>
                    </td>
                </tr>
            </table>

            <p>🌟 Notre équipe vous contactera prochainement avec plus de détails sur l'événement et nous vous reviendrons sous peu.</p>
        </div>
        
        <div class="footer">
            <p><strong>ACD Corporate Services</strong> - Promouvoir l'excellence </p>
            <p>&copy; {{ date('Y') }} ACD Corporate Services. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>