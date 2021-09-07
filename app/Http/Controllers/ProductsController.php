<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    public function products(){
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function detail($id){
        $product = Product::find($id);
        return view('detail')->with('product', $product);
    }

    public function cart(){
    
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart =  session()->get('cart');

        if(!$cart){
            
            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "imagen" => $product->imagen,
                    "price" => $product->price
                 
                ]
                ];
                session()->put('cart', $cart);

                return redirect()->back()->with('success', 'Product added to cart seccessfully!');
        }

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;

            session()->put('cart', $cart);
            return redirect()->back()->with('seccess', 'Product added to cart successfully!');
        }

        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "imagen" => $product->imagen,
            "price" => $product->price
          
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
}
