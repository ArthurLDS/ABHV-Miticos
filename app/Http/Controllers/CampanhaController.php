<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Product;
use App\Campanha;
use Illuminate\Http\Request;

class CampanhaController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {   
        /*$product = new Product;
        $product->name        = "Maça";
        $product->description = "Fruta";
        $product->quantity    =10;
        $product->price       = 1.49;
        $product->save();*/
        
        $campanhas = Campanha::orderBy('created_at', 'desc')->paginate(10);
        return view('campanhas', ['$campanhas' => $campanhas]);
    }
    
    public function store(Request $request)
    {
        print( $request );
        $campanha = new Campanha;
        $campanha->fill($request->all());
        $campanha->save();
        return response()->json(["message" => "foiii"], 200); 
    }
}