<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\donhang;
use App\Models\donhangct;
class donhangcontroller extends Controller
{
   
    function donhanguser()
    {
        $donhang = Donhang::where('id_nguoi', Auth::id())->get();
        return view('user.donhanguser', compact('donhang'));
    }
 
    
    
    
}
