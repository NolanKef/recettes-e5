<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>
<body>
<title>Gestion des utilisateurs</title>
    <div class="nav-links">
    <a href="" target="_blank"><img src="pics/home.png" width="20px"></a>
    <a href="">Déconnexion</a>
    <a href="">Edition</a>
    </div>

    <section class="profile-content">
    <h1><span>Espace de</span> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h1>
    <a class="add-btn" href="">Ajouter utilisateur</a>
    <ul>
    <h1> <span>utilisateur(s)<span></h1>
        @foreach ($users as $user)
            <li><a href="">{{ $user->first_name }} {{ $user->last_name }}</a></li>
        @endforeach
    </ul>
    </section>
</body>
</html>