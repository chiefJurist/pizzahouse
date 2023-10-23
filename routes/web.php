<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pizzas', function () {
    //get data from database
    
    $pizzas = [
        ["type" => "Hawaiin", "base" => "cheesy crust"],
        ["type" => "Volcano", "base" => "garlic crust"],
        ["type" => "veg supreme", "base" => "thin and crispy"]
    ];

    //QUERY PARAMETERS
    // $name = request("name");
    // $age = request("age");

    return view('pizzas', [
        "pizzas" => $pizzas,
        // "name" => $name,
        // "age" => $age
        "name" => request("name"),
        "age" => request("age")
    ]);
});