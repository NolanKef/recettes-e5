<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnityController;
use App\Http\Controllers\RecipeController;
use App\Models\Type;
use App\Models\Unity;
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

//Route::get('/add_recipe', [RecipeController::class, 'index']);
Route::get('/add_recipe', function () {
    $types = Type::all();
    $unitys = Unity::all();

    return view('add_recipe', compact('types', 'unitys'));
});

Route::get('/', function () {
    return view('welcome');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::get('/profile', function () {
    return view('profile', [
        'user' => Auth::user()
    ]);
})->middleware('auth');
