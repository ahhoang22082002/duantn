<?php

namespace App\Http\Controllers;
use App\Models\hoa;
use Illuminate\Http\Request;


class homecontroller extends Controller
{
    function spmoi(){
        
        $hoa = hoa::select('id_hoa', 'id_dm', 'tenhoa', 'gia', 'img')
        ->orderBy('id_hoa', 'desc')
        ->limit(3)
        ->get();
    return view('trangchu', ['hoa' => $hoa]);
    
    
     
    }
    function gioithieu(){
        return view(' pages.gioithieu');
    }
    function lienhe(){
        return view(' pages.lienhe');
    }
    function baiviet(){
        return view(' pages.baiviet');
    }
 
  
  
}
