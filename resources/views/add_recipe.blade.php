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
    <a href="{{ url('profile') }}">Liste des recettes</a>
    <a href="">Déconnexion</a>
    </div>
<section class="main-content">
    <form action="{{ route('recipes.store') }}" method="POST">
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
</section>
<script>
document.addEventListener("DOMContentLoaded", function () {
    let ingredientCount = 0;

    window.generateIngredientFields = function () {
        ingredientCount++;
        document.getElementById("ingredientCount").value = ingredientCount;

        const ingredientFieldsDiv = document.getElementById("ingredientFields");

        // Création du conteneur pour chaque groupe de champs
        const fieldContainer = document.createElement("div");
        fieldContainer.id = `ingredientField${ingredientCount}`;
        fieldContainer.style.marginBottom = "10px";
        ingredientFieldsDiv.appendChild(fieldContainer);

        // Champ pour le nom de l'ingrédient
        const ingredientLabel = document.createElement("label");
        ingredientLabel.innerText = `Ingrédient ${ingredientCount} : `;
        fieldContainer.appendChild(ingredientLabel);

        const ingredientInput = document.createElement("input");
        ingredientInput.type = "text";
        ingredientInput.name = `ingredient${ingredientCount}`;
        ingredientInput.placeholder = "Nom de l'ingrédient";
        ingredientInput.required = true;
        fieldContainer.appendChild(ingredientInput);

        // Champ pour la quantité
        const quantityLabel = document.createElement("label");
        quantityLabel.innerText = " Quantité : ";
        fieldContainer.appendChild(quantityLabel);

        const quantityInput = document.createElement("input");
        quantityInput.type = "number";
        quantityInput.name = `quantity${ingredientCount}`;
        quantityInput.placeholder = "Quantité";
        quantityInput.required = true;
        fieldContainer.appendChild(quantityInput);

        // Liste déroulante pour les unités
        const unitLabel = document.createElement("label");
        unitLabel.innerText = " Unité : ";
        fieldContainer.appendChild(unitLabel);

        const unitSelect = document.createElement("select");
        unitSelect.name = `unity${ingredientCount}`;
        unitSelect.required = true;

        // Remplir le menu déroulant avec les données des unités
        const data = @json($unitys->pluck('label', 'code'));
        Object.entries(data).forEach(([code, label]) => {
            console.log(`Ajout de l'option: id=${code}, label=${label}`);
            const option = document.createElement("option");
            option.value = code;
            option.textContent = label;
            unitSelect.appendChild(option);
        });
        fieldContainer.appendChild(unitSelect);

        // Bouton pour supprimer ce groupe de champs
        const deleteButton = document.createElement("button");
        deleteButton.type = "button";
        deleteButton.textContent = "Retirer";
        deleteButton.style.marginLeft = "10px";
        deleteButton.addEventListener("click", () => {
            ingredientFieldsDiv.removeChild(fieldContainer);
        });
        fieldContainer.appendChild(deleteButton);
    };
});

</script>
</body>
</html>