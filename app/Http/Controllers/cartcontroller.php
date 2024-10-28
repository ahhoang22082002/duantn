<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class cartcontroller extends Controller
{
    function cart(){
        $cart = Session::get('cart', []);
    
        
        
        return view('cart', compact('cart'));
       
      }

     function cartadd(Request $request)
    {
       
        $product = [
            'id' => $request->id,
            'img' => $request->img,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ];
        $cart = Session::get('cart', []);
        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] += $product['quantity'];
        } else {
            $cart[$request->id] = $product;
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

    public function cartupdate(Request $request)
{
    \Log::info('Update cart called', $request->all());

    $cart = Session::get('cart', []);
    if (isset($cart[$request->id])) {
        $cart[$request->id]['quantity'] = $request->quantity;
    }
    Session::put('cart', $cart);
    return redirect()->route('cart');
}

    

    function cartremove(Request $request)
    {
        $cart = Session::get('cart', []);
        unset($cart[$request->id]);
        Session::put('cart', $cart);
        return redirect()->route('cart');
    }
}
