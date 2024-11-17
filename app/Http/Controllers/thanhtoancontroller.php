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
  function submitorder(Request $request)
{
    $userId = Auth::id();
    $cart = Session::get("cart_{$userId}", []);
    $total = Session::get("final_amount_{$userId}", array_reduce($cart, fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0));
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
        ]);
        foreach ($cart as $item) {
            donhangct::create([
                'id_donhang' => $order->id_donhang,
                'id_hoa' => $item['id'],
                'soluong' => $item['quantity'],
                'gia' => $item['price'],
            ]);
        }

        \DB::commit();
        if ($phuongThucTT === 'Thanh toán khi nhận hàng') {
            Mail::to(Auth::user()->email)->send(new XacNhan($order));
            Session::forget("cart_{$userId}");
            return redirect()->route('cart')->with('success', 'Đặt hàng thành công!');
        } 
        else {
            $vnpUrl = config('services.vnpay.url');
            $vnpTmnCode = config('services.vnpay.tmn_code');
            $vnpHashSecret = config('services.vnpay.hash_secret');
            $vnpOrderInfo = "Thanh toán đơn hàng";
            $vnpAmount = $total * 100; 
            $vnpTxnRef = $order->id_donhang;
            $vnpIpAddr = request()->ip();

            $inputData = [
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnpTmnCode,
                "vnp_Amount" => $vnpAmount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnpIpAddr,
                "vnp_Locale" => "vn",
                "vnp_OrderInfo" => $vnpOrderInfo,
                "vnp_OrderType" => "other",
                "vnp_ReturnUrl" => route('payment.return'),
                "vnp_TxnRef" => $vnpTxnRef,
            ];
            // dd($request->all());
            ksort($inputData);
            $hashData = "";
            foreach ($inputData as $key => $value) {
                $hashData .= urldecode($key) . "=" . urldecode($value) . '&';
            }
            $hashData = rtrim($hashData, '&');
            $vnpSecureHash = hash_hmac('sha512', $hashData, $vnpHashSecret);
            $vnpUrl = $vnpUrl . "?" . $hashData . "&vnp_SecureHash=" . $vnpSecureHash;
            // Session::forget("cart_{$userId}");
            return redirect()->away($vnpUrl);
        }

    } catch (\Exception $e) {
        \DB::rollback();
        \Log::error('Error during order submission: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Có lỗi xảy ra trong quá trình thanh toán.');
    }
}

 function paymentReturn(Request $request)
  {
      $vnp_HashSecret = config('services.vnpay.hash_secret');
      $inputData = $request->all();
      $vnp_SecureHash = $inputData['vnp_SecureHash'];
      unset($inputData['vnp_SecureHash']);
      unset($inputData['vnp_SecureHashType']);
      ksort($inputData);

      $hashData = "";
      foreach ($inputData as $key => $value) {
          $hashData .= urldecode($key) . "=" . urldecode($value) . '&';
      }
      $hashData = rtrim($hashData, '&');
  
      $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
  
      if ($secureHash === $vnp_SecureHash) {
          if ($inputData['vnp_ResponseCode'] == '00') {
              $orderId = $inputData['vnp_TxnRef'];
              donhang::where('id_donhang', $orderId)->update([
                  'trangthai' => 'Đã thanh toán',
              ]);
              return redirect()->route('cart')->with('success', 'Thanh toán thành công!');
          } else {
              return redirect()->route('cart')->with('error', 'Thanh toán thất bại!');
          }
      } else {
          return redirect()->route('cart')->with('error', 'Chữ ký không hợp lệ!');
      }
  }

}
 