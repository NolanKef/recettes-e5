<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <title>Connexion</title>
</head>
<body>
<section class="main-content">
<form action="{{ route('login.submit') }}" method="POST">
@csrf
        <h2>Connexion</h2>
        <label>Adresse mail</label>
        <br>
        <input name="email" type="email">
        <br><br>
        <label>Mot de passe</label>
        <br>
        <input name="password" type="password">
        <br><br>
        <a class="form-link" href="{{ route('signin') }}">Inscription</a><input class="form-btn" name="save" type="submit" value="Connexion">
        <br><br>
    </form>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</section>
</body>
</html>