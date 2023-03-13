<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function create(){
        $products = Product::all();
        return view('products',compact('products'));
    }
    public function store(Request $request){
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return back()->with('message','Product created successfully!');
    }

    public function cart()
    {
        return view('cart');
    }
    public function addTOCart(Request $request)
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];
        $cart[$request->product_id]['quantity'] = $request->quantity;
        $cart[$request->product_id]['price'] = $request->price;
        $cart[$request->product_id]['name'] = $request->name;
        $cart[$request->product_id]['description'] = $request->description;
        session()->put('cart', $cart);
        return redirect()->to('/cart');
    }

    public function removeFromCart(Request $request){
        $cart = session()->get('cart');
        unset($cart[$request->id]);
        session()->put('cart', $cart);

        return back();
    }
}
