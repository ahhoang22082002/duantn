<?php

namespace App\Http\Controllers;
use App\Models\hoa;
use Illuminate\Http\Request;


class homecontroller extends Controller
{
    function spmoi(){
        
        $query = hoa::select('id_hoa', 'id_dm', 'tenhoa', 'gia', 'img')
        ->orderBy('id_hoa', 'desc')
        ->limit(3);
    
    $hoa = $query->get();
    return view('trangchu', ['hoa' => $hoa]);
    
    
     
    }
    function gioithieu(){
        return view(' gioithieu');
    }
    function lienhe(){
        return view(' lienhe');
    }
    function baiviet(){
        return view(' baiviet');
    }
    function dashboard(){
        
        return view('admin.dashboard');
    }
   function qlsp(){
    $hoa = hoa::select('id_hoa', 'id_dm', 'tenhoa', 'gia', 'img')
    ->orderBy('id_hoa', 'asc')
    ->paginate(10);

return view('admin.qlsanpham', compact('hoa'));

   }
  
}
