<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\khuyenmai;
class cartcontroller extends Controller
{
    function cart(){
        $userId = Auth::id();
        $cart = Session::get("cart_{$userId}", []);
        $discount = Session::get("discount_{$userId}", 0); 
        return view('cart_checkout.cart', compact('cart','discount'));
       
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
        Session::forget("final_amount_{$userId}");
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    function updatecart(Request $request) {
        $userId = Auth::id();
        $cart = Session::get("cart_{$userId}", []);

        foreach ($request->quantity as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
            }
        }
        Session::put("cart_{$userId}", $cart);
        Session::forget("final_amount_{$userId}");
        return redirect()->route('cart');
    }

    function cartremove(Request $request)
    {
        $userId = Auth::id();
        $cart = Session::get("cart_{$userId}", []);
        unset($cart[$request->id]);
        Session::put("cart_{$userId}", $cart);
        Session::forget("final_amount_{$userId}");
        return redirect()->route('cart');
    }
    function apdungkm(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string|max:255',
        ]);
        $userId = Auth::id();
        $couponCode = $request->coupon_code;
        
        
        
        $discount = khuyenmai::where('ma_khuyenmai', $couponCode)
            ->where('ngay_bat_dau', '<=', now())
            ->where('ngay_ket_thuc', '>=', now())
            ->first();

        if ($discount) {

            $discountAmount = $discount->phantramgiam;
            Session::put("discount_{$userId}", $discountAmount);
            $cart = Session::get("cart_{$userId}", []);
            $totalAmount = 0;
            foreach ($cart as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }

            $discountedAmount = ($totalAmount * $discountAmount) / 100;
            $finalAmount = $totalAmount - $discountedAmount;
            Session::put("discount_{$userId}", $discountAmount);
            Session::put("final_amount_{$userId}", $finalAmount);
            return redirect()->route('thanhtoan')->with('success', 'Mã khuyến mãi đã được áp dụng!');
        } else {
            return redirect()->route('thanhtoan')->with('error', 'Mã khuyến mãi không hợp lệ!');
        }
    }
function muangay(Request $request)
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
        $cart[$request->id] = $product;
        Session::put("cart_{$userId}", $cart);
        if ($userId) {
            Session::put("cart_{$userId}", $cart);
            return redirect()->route('thanhtoan'); 
        } else {
            Session::put('cart_guest', $cart);
            return redirect()->route('custhanhtoan'); 
        }
    }
    
 
}
