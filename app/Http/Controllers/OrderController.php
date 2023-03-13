<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function addOrder(Request $request)
    {
        $cart = session()->get('cart');

        $total = 0;
        foreach($cart as $key => $item){
            $total += $item['price']* $item['quantity'];
        }
        $order = Order::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'user_id' => Auth::user()->id,
            'total' => $total
        ]);

        foreach($cart as $key => $item){
            Item::create([
                'product_id' => $key,
                'order_id' => $order->id,
                'quantity' => $item['quantity']
            ]);
        }
        session()->forget('cart');
        return redirect()->to('/products');
    }

    public function orders()
    {
        $orders = auth()->user()->orders;
        return view('orders',compact('orders'));
    }
}
