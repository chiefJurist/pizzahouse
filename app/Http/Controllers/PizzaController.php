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
        $pizza = new Pizza();

        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->toppings = request('toppings');

        $pizza->save();

        return redirect('/')->with('mssg', 'Thanks for your order');
    }

    public function destroy ($id) {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');
    }
}