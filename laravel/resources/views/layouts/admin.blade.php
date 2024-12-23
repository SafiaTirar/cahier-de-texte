<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application - Administrateur</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="container">
                <a href="{{ route('admin.dashboard') }}" class="logo">Gestion des Séances</a>
                <ul class="menu">
                    <li><a href="{{ route('admin.affectations.create') }}">Affectations</a></li>
                    <li><a href="{{ route('admin.seances.index') }}">Liste des Séances</a></li>
                    <li><a href="{{ route('logout') }}">Déconnexion</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container">
        @yield('content')
    </main>
    <footer class="footer">
        <p>&copy; {{ date('Y') }} - Application Gestion des Séances</p>
    </footer>
</body>
</html>
