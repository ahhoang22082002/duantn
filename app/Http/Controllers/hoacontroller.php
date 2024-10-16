<?php

namespace App\Http\Controllers;
use App\Models\hoa;
use Illuminate\Http\Request;
use DB;

class hoacontroller extends Controller
{
    function allsp(){
        $query = DB::table('hoa')
        ->select('id_hoa','id_dm','tenhoa','gia','img')
        ->orderBy('id_hoa','asc');
        $hoa=$query->get();
        return view('cuahang',['hoa'=>$hoa]);
    }
    function chitiethoa($id_hoa){
        $hoa = DB::table('hoa')
        ->where('id_hoa', $id_hoa)->first();
        return view('chitietsp',['hoa'=>$hoa]);
    }
}
