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


    //Function for getting a single record
    public function show ($id) {
        $pizza = Pizza::findOrFail($id);
        return view('pizzas.show', ["pizza" => $pizza]);
    }


    //Function for creating a webform
    public function create () {
        return view('pizzas.create');
    }


    //Function for Saving Data
    public function store() {
        error_log(request('name'));
        error_log(request('type'));
        error_log(request('base'));

        return redirect('/');
    }
}
