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
    @if ($user->id_role == 1)
    <a href="{{ route('users.index') }}"><img src="{{ asset('pics/users.png') }}" width="30px"></a>
    @endif
    <form action="{{ route('logout') }}" method="POST">@csrf<button type="submit">Déconnexion</button></form>
    <a href="">Edition</a>
    </div>
    <section class="profile-content">
    <h1><span>Recettes de {{ $user->first_name }} {{ $user->last_name }}</span></h1>
    <a class="add-btn" href="{{ url('add_recipe') }}">Ajouter +</a>
    <ul>
        @foreach ($recipes as $recipe)
            <li><a href="{{ route('recipe.show', $recipe->id_recipe) }}">{{ $recipe->recipe_name }}</a></li>
        @endforeach
    </ul>
    </section>
</body>
</html>