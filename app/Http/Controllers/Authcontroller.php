<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nguoidung;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    function showRegisterForm()
    {
        return view('register');
    }
    function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:nguoidung',
            'matkhau' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        nguoidung::create([
            'ten' => $request->ten,
            'email' => $request->email,
            'matkhau' => Hash::make($request->matkhau),
            'diachi' => $request->diachi,
            'sdt' => $request->sdt,
           
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }

    function showLoginForm()
    {
        return view('login');
    }
    function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|string|email',
        'matkhau' => 'required|string|min:6',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    if (Auth::attempt(['email' => $request->email, 'password' => $request->matkhau])) {
        return $this->ktranguoidung();
    }
    

    return redirect()->back()->withErrors(['message' => 'Email hoặc mật khẩu không đúng.'])->withInput();
}

function ktranguoidung()
{

    if (Auth::check()) {
        $user = Auth::user();
        return $user->role == 1 
            ? redirect()->route('ad')
            : redirect()->route('trangchu'); 
    }
    return redirect()->route('login');
}
function taikhoan(Request $request){
    $user = Auth::user();
    return view('taikhoan', compact('user'));
}
function capnhattaikhoan(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:nguoidung,email,' . $user->id_nguoi . ',id_nguoi',
            'diachi' => 'nullable|string|max:255',
            'sdt' => 'nullable|string|max:15',
            'matkhau' => 'nullable|string|min:6|confirmed',
            'matkhau_confirmation' => 'nullable|string|min:6|same:matkhau',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user->ten = $request->ten;
        $user->email = $request->email;
        $user->diachi = $request->diachi;
        $user->sdt = $request->sdt;
        
        
        if ($request->filled('matkhau')) {
            $user->matkhau = Hash::make($request->matkhau);
        }

        $user->save();

        return redirect()->route('taikhoan')->with('success', 'Cập nhật thông tin thành công!');
    }

}

