<?php

namespace App\Http\Controllers;

use App\Mail\xacnhan;
use Illuminate\Http\Request;
use App\Models\donhang;
use App\Models\donhangct;
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class thanhtoancontroller extends Controller
{
    function submitOrder(Request $request) 
    {
        $userId = Auth::id();
        $cart = Session::get("cart_{$userId}", []);
        $total = array_reduce($cart, fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0);
        $phuongThucTT = $request->phuongthuctt === 'cod' ? 'Thanh toán khi nhận hàng' : 'Thanh toán online';
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống, không thể thanh toán.');
        }
        \DB::beginTransaction();
    
        try {
            
            $order = donhang::create([
                'id_nguoi' => $userId,
                'ten' => Auth::user()->ten,
                'ngaydat' => now(),
                'trangthai' => 'Đã đặt hàng',
                'phuongthuctt' => $phuongThucTT,
                'tongtien' => $total,
                'id_tt'=> 1,
            ]);
    
           
            foreach ($cart as $item) {
                donhangct::create([
                    'id_donhang' => $order->id_donhang,
                    'id_hoa' => $item['id'],
                    'soluong' => $item['quantity'],
                    'gia' => $item['price'],
                    'id_km' => null,
                    'id_danhgia' => null,
                    
                ]);
            }
    
         
            
            \DB::commit();
           
            if ($phuongThucTT === 'Thanh toán khi nhận hàng') {
                Mail::to(Auth::user()->email)->send(new XacNhan($order));
            }
            

           
            Session::forget("cart_{$userId}");
           
            return redirect()->route('cart')->with('success', 'Đặt hàng thành công! ');
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::error('Error during order submission: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra trong quá trình thanh toán.');
        }
        
    }
    function showtt(){
        $user = Auth::user();
        $userId = Auth::id();
        $cart = Session::get("cart_{$userId}", []);
        $totalamount = array_reduce($cart, fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0);
        return view('cart_checkout.thanhtoan', compact('user', 'cart', 'totalamount'));
    }
  function test(){
    $orders = donhang::where('id_nguoi', Auth::id())->first();
    Mail::to(Auth::user()->email)->send(new XacNhan($orders));
  }
}
