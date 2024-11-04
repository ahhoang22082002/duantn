<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donhang;
use App\Models\donhangct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class thanhtoancontroller extends Controller
{
    public function showtt(){
        $userId = Auth::id();
        $cart = Session::get("cart_{$userId}", []);
        $totalamount = array_reduce($cart, fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0);
        return view('thanhtoan', compact('cart','totalamount'));
      
    }
  
}
