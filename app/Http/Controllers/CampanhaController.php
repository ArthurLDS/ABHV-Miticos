<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;

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
        
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('campanhas', ['products' => $products]);
    }
    
    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->quantity    = $request->quantity;
        $product->price       = $request->price;
        $product->save();
        return redirect()->route('products.index')->with('message', 'Product created successfully!');
    }
}