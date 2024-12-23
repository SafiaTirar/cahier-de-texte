<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>

    <div class="container">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>Connexion</h2>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required>
            </div>

            <button type="submit" class="btn">Connexion</button>

            <div class="link">
                <a href="{{ route('register') }}">Pas encore de compte ? Inscrivez-vous</a>
            </div>
        </form>
    </div>
</body>
</html>
