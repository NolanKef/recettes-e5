<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <title>Ajouter une recette</title> 
</head>
<body>
    <div class="nav-links">
    <a href="">Liste des recettes</a>
    <a href="">Déconnexion</a>
    </div>
<section class="main-content">
    <form action="" method="POST">
    @csrf
    <h2>Ajouter une recette</h2>
    <input type="hidden" id="ingredientCount" name="ingredientCount" value="0">
    <br><br>
        <label>Intitulé de la recette</label>
        <br>
        <input name="title" type="text" placeholder="Titre">
        <br><br>
        <label>Type de recette</label>
        <br>
        @isset($types)
        <select name="type">
        @foreach($types as $type)
                <option value="{{ $type->id_type }}">{{ $type->label }}</option>
        @endforeach
        </select>
        @else
        <p></p>
        @endisset
        <br><br>
        <label>Végan</label>
        <br>
        <label>Oui</label>
        <input type="radio" name="vegan" value="1">
        <label>Non</label>
        <input type="radio" name="vegan" value="0">
        <br><br>
        <label>Visibilité</label>
        <br>
        <label>Publique</label>
        <input type="radio" name="view" value="1">
        <label>Privée</label>
        <input type="radio" name="view" value="0">
        <br><br>
        <label for="ingredientCount">Nombre d'ingrédients :</label>
        <br>
        <button type="button" onclick="generateIngredientFields()">Ajouter</button><br>
        <div id="ingredientFields"></div>
        <label>Contenu de la recette</label>
        <br>
        <textarea name="content" placeholder="Contenu de la recette..."></textarea>
        <br><br>

        <input class="add-btn" name="save" type="submit" value="Ajouter la recette">
        <br><br>
    </form>
    <script>
        let ingredientCount = 0;
    function generateIngredientFields() {
            ingredientCount++;
            const data = @json($unitys->pluck('label'));
            document.getElementById("ingredientCount").value = ingredientCount;

            const ingredientFieldsDiv = document.getElementById("ingredientFields");
            const fieldContainer = document.createElement("div");
            ingredientFieldsDiv.appendChild(fieldContainer);

                const ingredientLabel = document.createElement("label");
                ingredientLabel.innerText = `Ingrédient ${ingredientCount} : `;
                fieldContainer.appendChild(ingredientLabel);

                const ingredientInput = document.createElement("input");
                ingredientInput.type = "text";
                ingredientInput.name = `ingredient${ingredientCount}`;
                ingredientInput.required = true;
                fieldContainer.appendChild(ingredientInput);

                const quantityLabel = document.createElement("label");
                quantityLabel.innerText = " Quantité : ";
                fieldContainer.appendChild(quantityLabel);

                const quantityInput = document.createElement("input");
                quantityInput.type = "text";
                quantityInput.name = `quantity${ingredientCount}`;
                quantityInput.required = true;
                fieldContainer.appendChild(quantityInput);

                const menu = document.createElement("select");
                menu.name = `unity${ingredientCount}`;

                data.forEach(value => {
                const option = document.createElement('option');
                option.value = value;
                option.textContent = value;
                menu.appendChild(option);
                });
                fieldContainer.appendChild(menu);

                const suppButton = document.createElement("button");
                suppButton.textContent = "Retirer";
                suppButton.type = "button";

                suppButton.addEventListener('click', () => {
                ingredientFieldsDiv.removeChild(fieldContainer);
                });
                fieldContainer.appendChild(suppButton);

                fieldContainer.appendChild(document.createElement("br"));
        }

    </script>
</section>
</body>
</html>