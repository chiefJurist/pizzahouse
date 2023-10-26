<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    //Protecting Routes
    // public function __construct() {
    //     $this->middleware("auth");
    // }
    //The method above applies the auth to all views

    public function index () {
        //Getting data from the database
        //$pizzas = Pizza::all();
        //$pizzas = Pizza::orderBy("name", "desc")->get();
        //$pizzas = Pizza::where("type", "hawaiian")->get();
        $pizzas = Pizza::latest()->get();

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