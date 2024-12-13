<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <title>{{ $recipe->recipe_name }}</title>
</head>
<body>
<div class="nav-links">
    <a href="{{ url('profile') }}">Liste des recettes</a>
    </div>
<section class="recipe-content">
    <h3><span>{{ $recipe->recipe_name }}</span></h3>
    <h4>{{ $recipe->type->label }}</h4>
    <h5>Ingrédients</h5>
    <div class="ingredient-content">
    @foreach ($recipe->quantities as $quantity)
        <li>{{ $quantity->quantite }} {{ $quantity->unity->label }} de {{ $quantity->ingredient->label }}</li>
    @endforeach
    </div>
    <h5>Préparation</h5>
    <div class="preparation-content">
    <p>{{ $recipe->recipe_content }}</p>
</div>
</section>
</body>
</html>