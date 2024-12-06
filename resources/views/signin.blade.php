<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <title>Inscription</title>
</head>
<body>
<section class="main-content">
    <form action="{{ route('signin') }}" method="POST">
    @csrf
        <h2>Inscription</h2>
        <label>Nom</label>
        <br>
        <input name="last_name" value="{{ old('last_name') }}" type="text">
        @error('last_name') <span>{{ $message }}</span> @enderror
        <br><br>
        <label>Prénom</label>
        <br>
        <input name="first_name" value="{{ old('first_name') }}" type="text">
        @error('first_name') <span>{{ $message }}</span> @enderror
        <br><br>
        <label>Login</label>
        <br>
        <input name="login" value="{{ old('login') }}" type="text">
        @error('login') <span>{{ $message }}</span> @enderror
        <br><br>
        <label>Adresse mail</label>
        <br>
        <input name="email" value="{{ old('email') }}" type="email">
        @error('email') <span>{{ $message }}</span> @enderror
        <br><br>
        <label>Mot de passe</label>
        <br>
        <input name="password" value="{{ old('password') }}" type="password">
        @error('password') <span>{{ $message }}</span> @enderror
        <br><br>
        <label>Confirmation mot de passe</label>
        @error('password') <span>{{ $message }}</span> @enderror
        <br>
        <input name="password_confirmation" value="{{ old('password_confirmation') }}" type="password">
        <br><br>
        <a class="form-link" href="{{ route('login') }}">Connexion</a><input class="form-btn" name="save" type="submit" value="Inscription">
        <br><br>
    </form>
</section>
</body>
</html>