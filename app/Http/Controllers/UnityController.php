<?php

namespace App\Http\Controllers;
use App\Models\Unity;
use Illuminate\Http\Request;

class UnityController extends Controller
{
    //
    public function index()
    {
        $unitys = Unity::all();

        return view('add_recipe', compact('unitys'));
    }
}
