<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\donhang;
use App\Models\donhangct;
class donhangcontroller extends Controller
{
    public function submitOrder(Request $request) 
    {
        $userId = Auth::id();
        $cart = Session::get("cart_{$userId}", []);
        $total = array_reduce($cart, fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0);
        $phuongThucTT = $request->phuongthuctt === 'cod' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng';
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống, không thể thanh toán.');
        }
        \DB::beginTransaction();
    
        try {
            
            $order = donhang::create([
                'id_nguoi' => $userId,
                'ten' => Auth::user()->ten,
                'ngaydat' => now(),
                'trangthai' => 'Đang xử lý',
                'phuongthuctt' => $phuongThucTT,
                'tongtien' => $total,
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
    
         
            Session::forget("cart_{$userId}");
    
            \DB::commit();
    
            return redirect()->route('cart')->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->back()->with('error', 'Có lỗi xảy ra trong quá trình thanh toán.');
        }
    }
    
   
    
    
    
}
