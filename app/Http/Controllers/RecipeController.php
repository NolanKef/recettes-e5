<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Quantite;
use App\Models\Ingredient;
use App\Models\Unity;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    //
    public function create()
    {
    $unitys = Unity::all();
    return view('recipes.create', compact('unitys'));
    }

    public function show($id)
    {

    $recipe = Recipe::with([
        'quantities.ingredient',
        'quantities.unity',
        'type'
    ])->findOrFail($id);

    return view('recipe', compact('recipe'));
    }

    public function userRecipes()
    {
        $user = Auth::user();
        $recipes = Recipe::with('type')
        ->where('id_user', $user->id)
        ->get();

        return view('profile', compact('recipes', 'user'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|integer|exists:type,id_type',
            'vegan' => 'required|boolean',
            'view' => 'required|boolean',
            'content' => 'required|string',
            'ingredientCount' => 'required|integer|min:1',
        ]);

        $recipe = Recipe::create([
            'recipe_name' => $validated['title'],
            'recipe_content' => $validated['content'],
            'view' => $validated['view'],
            'date_add' => now(),
            'id_user' => Auth::id(),
            'id_type' => $validated['type'],
        ]);

        $ingredientCount = $validated['ingredientCount'];

        for ($i = 1; $i <= $ingredientCount; $i++) {
            $request->validate([
                "ingredient{$i}" => 'required|string|max:255',
                "quantity{$i}" => 'required|numeric|min:0.01',
                "unity{$i}" => 'required|exists:unite,code',
            ]);

            $ingredientId = $request->input("ingredient{$i}");
            $quantity = $request->input("quantity{$i}");
            $unity = $request->input("unity{$i}");

            $ingredientName = $request->input("ingredient{$i}");
            $ingredient = Ingredient::firstOrCreate(
                ['label' => $ingredientName],
                ['label' => $ingredientName]
            );
            $ingredientId = $ingredient->id;

            $quantite = new Quantite();
            $quantite->id_recipe = $recipe->id_recipe;
            $quantite->id_ingredient = $ingredient->id_ingredient;
            $quantite->quantite = $quantity;
            $quantite->code = $unity;
            $quantite->save();
    
            /*Quantite::create([
                'id_recipe' => $recipe->id_recipe,
                'id_ingredient' => $ingredientId,
                'quantite' => $quantity,
                'code' => $unity,
            ]);*/
        }

        return redirect()->back()->with('success', 'La recette a bien été ajoutée !');
    }
}
