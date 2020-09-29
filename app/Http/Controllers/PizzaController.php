<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class PizzaController extends Controller
{
    public function index(){

     //$pizzas = Pizza::where('type', 'hawaian')->get();
     $pizzas = Pizza::all();
        
            return view('pizzas', [
            'pizzas' => $pizzas
            ]);
    }

    public function show($id){
        return view('details', ['id' => $id]);
    }
}
