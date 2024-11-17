<?php

namespace App\Http\Controllers;
use App\Models\hoa;
use App\Models\donhangct;
use DB;
use Illuminate\Http\Request;


class homecontroller extends Controller
{
    function sp(){
        
        $hoa = hoa::select('id_hoa', 'id_dm', 'tenhoa', 'gia', 'img')
        ->orderBy('id_hoa', 'desc')
        ->limit(3)
        ->get();
        $sale = donhangct::select('hoa.id_hoa', 'hoa.tenhoa', 'hoa.gia','hoa.img', DB::raw('SUM(donhangct.soluong) as total_sold'))
    ->join('hoa', 'donhangct.id_hoa', '=', 'hoa.id_hoa')
    ->groupBy('hoa.id_hoa', 'hoa.tenhoa', 'hoa.gia','hoa.img')
    ->orderByDesc('total_sold')
    ->limit(3)
    ->get();

    return view('trangchu', compact('hoa','sale'));
    
    
     
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
