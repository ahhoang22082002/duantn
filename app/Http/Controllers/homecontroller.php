<?php

namespace App\Http\Controllers;
use App\Models\hoa;
use Illuminate\Http\Request;
use DB;

class homecontroller extends Controller
{
    function spmoi(){
        
            $query = DB::table('hoa')
            ->select('id_hoa','id_dm','tenhoa','gia','img')
            ->orderBy('id_hoa','desc')
            ->limit(3);
            $hoa=$query->get();
            return view('trangchu',['hoa'=>$hoa]);
        
     
    }
    function gioithieu(){
        return view('gioithieu');
    }
    function lienhe(){
        return view('lienhe');
    }
    function baiviet(){
        return view('baiviet');
    }

  
}
