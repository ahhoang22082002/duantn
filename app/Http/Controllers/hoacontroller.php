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
         
        return view('hoa.cuahang', compact('hoa', 'dm'));
    }

    function chitiethoa($id_hoa) {
        $hoa = hoa::where('id_hoa', $id_hoa)->first();
        $hoalq = hoa::where('id_dm', $hoa->id_dm)->get();

        return view('hoa.chitietsp', compact('hoa', 'hoalq'));
    }

    function sptheodm($id_dm) {
        $hoa = hoa::select('id_hoa', 'id_dm', 'tenhoa', 'gia', 'img')
            ->where('id_dm', $id_dm)
            ->orderBy('id_hoa', 'asc')
            ->get();
        
        $dm = danhmuc::select('id_dm', 'ten_dm')
            ->where('id_dm', $id_dm)
            ->first();

        return view('hoa.sptheodm', compact('hoa', 'dm'));
    }

    


function search(Request $request)
    {
        $query = $request->input('query');
        $sort = $request->input('sort');
        $hoaquery = Hoa::join('danhmuc', 'hoa.id_dm', '=', 'danhmuc.id_dm')
            ->where(function($q) use ($query) {
                $q->where('hoa.tenhoa', 'LIKE', "%$query%")
                  ->orWhere('hoa.mota', 'LIKE', "%$query%")
                  ->orWhere('danhmuc.ten_dm', 'LIKE', "%$query%");
            })
            ->select('hoa.*', 'danhmuc.ten_dm as ten_dm')
            ->distinct();

        switch ($sort) {
            case 'price_asc':
                $hoaquery->orderBy('hoa.gia', 'asc');
                break;
            case 'price_desc':
                $hoaquery->orderBy('hoa.gia', 'desc');
                break;
            case 'newest':
                $hoaquery->orderBy('hoa.id_hoa', 'desc');
                break;
            case 'oldest':
                $hoaquery->orderBy('hoa.id_hoa', 'asc');
                break;
            default:
                $hoaquery->orderBy('hoa.id_hoa', 'asc'); 
                break;
        }

        $hoa = $hoaquery->distinct()->paginate(8);
       
        $dm = DanhMuc::select('id_dm', 'ten_dm')
            ->orderBy('id_dm', 'asc')
            ->get();
        return view('hoa.cuahang', compact('hoa', 'dm'));
    }
    




}
