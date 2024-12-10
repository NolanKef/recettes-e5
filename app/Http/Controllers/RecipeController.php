<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    //
    public function index()
{
    $typeData = app(TypeController::class)->index();
    $unityData = app(UnityController::class)->index();

    return view('add_recipe', [
        'typeData' => $typeData,
        'unityData' => $unityData,
    ]);
}
}
