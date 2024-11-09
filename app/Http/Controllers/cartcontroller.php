<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class cartcontroller extends Controller
{
    function cart(){
        $userId = Auth::id();
        $cart = Session::get("cart_{$userId}", []);
        return view('cart', compact('cart'));
       
      }

     function cartadd(Request $request)
    {
        $userId = Auth::id();
        $product = [
            'id' => $request->id,
            'img' => $request->img,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ];
        $cart = Session::get("cart_{$userId}", []);
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] += $product['quantity'];
        } else {
            $cart[$request->id] = $product;
        }
        Session::put("cart_{$userId}", $cart);
        return redirect()->route('cart');
    }
    public function updatecart(Request $request) {
        $userId = Auth::id();
        $cart = Session::get("cart_{$userId}", []);

        foreach ($request->quantity as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
            }
        }
        Session::put("cart_{$userId}", $cart);
        return redirect()->route('cart');
    }

    function cartremove(Request $request)
    {
        $userId = Auth::id();
        $cart = Session::get("cart_{$userId}", []);
        unset($cart[$request->id]);
        Session::put("cart_{$userId}", $cart);
        return redirect()->route('cart');
    }
    public function orderForm()
{
    $userId = Auth::id();
    $cart = Session::get("cart_{$userId}", []);

    $totalAmount = array_reduce($cart, function ($carry, $item) {
        return $carry + ($item['price'] * $item['quantity']);
    }, 0);

    return view('order_form', compact('cart', 'totalAmount'));
}
 
}
