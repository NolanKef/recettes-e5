<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnityController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UserController;
use App\Models\Type;
use App\Models\Unity;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/signin', [RegisterController::class, 'showRegistrationForm'])->name('signin');
Route::post('/signin', [RegisterController::class, 'signin']);

Route::post('/recipes/store', [RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipe.show');
Route::get('/profile', [RecipeController::class, 'userRecipes'])->name('recipes.user');

Route::get('/manage_users', [UserController::class, 'index'])->name('users.index');

//Route::get('/add_recipe', [RecipeController::class, 'index']);
Route::get('/add_recipe', function () {
    $types = Type::all();
    $unitys = Unity::all();

    return view('add_recipe', compact('types', 'unitys'));
});

/*Route::get('/profile', function () {
    $recipes_content = Recipe::all();

    return view('profile', compact('recipes_content'));
});*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');*/

/*Route::get('/profile', function () {
    $recipes_content = Recipe::all();
    return view('profile', ['user' => Auth::user()], compact('recipes_content'));
})->middleware('auth');*/

Route::post('/logout', function (Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');
