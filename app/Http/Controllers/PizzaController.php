<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    public function index () {
        //Getting data from the database
        //$pizzas = Pizza::all(); //getting all the data
        //$pizzas = Pizza::orderBy("name", "desc")->get();//ordering by a specific column
        //$pizzas = Pizza::where("type", "hawaiian")->get();//Just like mysql where
        $pizzas = Pizza::latest()->get(); //orders by created_at
    
        return view('pizzas.index', ["pizzas" => $pizzas]);
    }

    public function show ($id) {
        return view('pizzas.show', ["id" => $id]);
    }

    //Function for creating a webform
    public function create () {
        return view('pizzas.create');
    }
}
