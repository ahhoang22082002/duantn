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
    function dhsearch(Request $request)
{
    $query = $request->input('query');
    $sort = $request->input('sort');
    $status = $request->input('status'); 
    $payst =$request->input('payst'); 
    $donhangds = DonHang::query();
    if ($query) {
        $donhangds->where(function($q) use ($query) {
            $q->where('ten', 'LIKE', "%$query%")
              ->orWhere('trangthai', 'LIKE', "%$query%")
              ->orWhereHas('donhangct.hoa', function ($querystring) use ($query) { 
                  $querystring->where('tenhoa', 'LIKE', "%$query%");
              });
        });
    }
    if ($status) {
        $donhangds->where('trangthai', $status);
    }
    if ($payst) {
        $donhangds->where('id_tt', $payst);
    }
    switch ($sort) {
        case 'moi':
            $donhangds->orderBy('id_donhang', 'desc');
            break;
        case 'cu':
            $donhangds->orderBy('id_donhang', 'asc');
            break;
       
        default:
            $donhangds->orderBy('id_donhang', 'desc');
            break;
    }

    
    $donhang = $donhangds->paginate(5);
    return view('admin.donhang.qldonhang', compact('donhang'));
}

    
    
    
}
