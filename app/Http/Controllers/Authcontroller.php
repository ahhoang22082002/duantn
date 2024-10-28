<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nguoidung;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class Authcontroller extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }
    public function register(Request $request)
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

    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
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

public function ktranguoidung()
{

    if (Auth::check()) {
        $user = Auth::user();
        return $user->role == 1 
            ? redirect()->route('ad')
            : redirect()->route('trangchu'); 
    }
    return redirect()->route('login');
}

    
}
