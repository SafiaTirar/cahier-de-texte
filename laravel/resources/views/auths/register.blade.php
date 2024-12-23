<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2>S'inscrire</h2>
            <div class="form-group">
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input id="password" type="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>
            <label for="role">Rôle :</label>
            <select name="role" id="role">
                <option value="user">Utilisateur</option>
                <option value="admin">Admin</option>
            </select>


            <button type="submit" class="btn">S'inscrire</button>

            <div class="link">
                <a href="{{ route('login') }}">Déjà un membre ? Connectez-vous</a>
            </div>
        </form>
    </div>
</body>
</html>
