<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>
<body>
<title>Recettes de {{ $user->first_name }} {{ $user->last_name }}</title>
    <div class="nav-links">
    <a href=""><img src="pics/users.png" width="25px"></a>
    <a href="">Déconnexion</a>
    <a href="">Edition</a>
    </div>
    <section class="profile-content">
    <h1><span>Recettes de {{ $user->first_name }} {{ $user->last_name }}</span></h1>
    <a class="add-btn" href="{{ url('add_recipe') }}">Ajouter +</a>
    <form class="form-filter" action="" method="POST">
        <select name="filtre">
        <option value="all">Tout</option>
        </select>
        <input type="submit" name="filter" value="Filtrer">
    </form>
    <ul>
    </ul>
    </section>
</body>
</html>