<?php

namespace App\Http\Controllers;
use App\Models\hoa;
use App\Models\danhmuc; 
use Illuminate\Http\Request;

class hoacontroller extends Controller
{
    function shop() {
        $hoa = hoa::select('id_hoa', 'id_dm', 'tenhoa', 'gia', 'img')
            ->orderBy('id_hoa', 'asc')
            ->paginate(8);
        
        $dm = danhmuc::select('id_dm', 'ten_dm')
            ->orderBy('id_dm', 'asc')
            ->get();

        return view('cuahang', compact('hoa', 'dm'));
    }

    function chitiethoa($id_hoa) {
        $hoa = hoa::where('id_hoa', $id_hoa)->first();

       

        $hoalq = hoa::where('id_dm', $hoa->id_dm)->get();

        return view('chitietsp', compact('hoa', 'hoalq'));
    }

    function sptheodm($id_dm) {
        $hoa = hoa::select('id_hoa', 'id_dm', 'tenhoa', 'gia', 'img')
            ->where('id_dm', $id_dm)
            ->orderBy('id_hoa', 'asc')
            ->get();
        
        $dm = danhmuc::select('id_dm', 'tendm')
            ->where('id_dm', $id_dm)
            ->first();

        return view('sptheodm', compact('hoa', 'dm'));
    }
}
