<!DOCTYPE html>
<html>
<head>
    <title>Nouveau message de contact</title>
</head>
<body>
    <h2>Nouveau message depuis le formulaire de contact</h2>
    <p><strong>Nom :</strong> {{ $data['name'] }}</p>
    <p><strong>Email :</strong> {{ $data['email'] }}</p>
    <p><strong>Sujet :</strong> {{ $data['subject'] }}</p>
    <p><strong>Message :</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
