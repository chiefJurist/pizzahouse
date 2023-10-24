<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index () {
        $pizzas = [
            ["type" => "Hawaiin", "base" => "cheesy crust"],
            ["type" => "Volcano", "base" => "garlic crust"],
            ["type" => "veg supreme", "base" => "thin and crispy"]
        ];
    
        return view('pizzas', [
            "pizzas" => $pizzas,
            "name" => request("name"),
            "age" => request("age")
        ]);
    }

    public function show ($id) {
        return view('details', ["id" => $id]);
    }
}
