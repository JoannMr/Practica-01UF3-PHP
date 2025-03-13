<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Usuaris amb almenys una comanda</title>
</head>
<body>
    <h1>Usuaris amb almenys una comanda:</h1>
    <ul>
        @foreach($usuaris as $usuari)
            <li>{{ $usuari->nom }} — Comandes: {{ $usuari->num_comandas }}</li>
        @endforeach
    </ul>
</body>
</html>
