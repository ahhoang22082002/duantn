<?php

namespace App\Http\Controllers;
use App\Models\hoa;
use App\Models\danhmuc;
use App\Models\nguoidung;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    function dashboard(){
        
        $hoa=hoa::select('id_hoa', 'id_dm', 'tenhoa', 'gia')
        ->limit(5)
    ->get();
    return view('admin.dashboard',  ['hoa' => $hoa]);
    }
   function qlsp(){
    $hoa = hoa::select('id_hoa', 'id_dm', 'tenhoa', 'gia', 'img')
    ->orderBy('id_hoa', 'desc')
    ->paginate(9);
    $tongsanpham = hoa::count(); 
    return view('admin.qlsanpham', compact('hoa','tongsanpham'));

   }

   function themsp(){
    $danhmuc = danhmuc::all(); 
    return view('admin.spcrud.themsp',compact('danhmuc'));
    }
    function add(Request $request){
        $request->validate([
            'tenhoa' => 'required',
            'gia' => 'required|numeric',
            'mota'=>'required',
            'id_dm' => 'required|exists:danhmuc,id_dm',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('img'), $imageName);
        }
    

        hoa::create([
        'tenhoa' => $request->tenhoa,
        'gia' => $request->gia,
        'mota' => $request->mota,
        'id_dm' => $request->id_dm,
        'img' =>  $imageName,
    ]);
        return redirect()->route('qlsp')->with('success', 'Sản phẩm đã được thêm thành công.');
    }
 function edit($id) {
    $hoa = hoa::findOrFail($id);
    $danhmuc = danhmuc::all(); 
    return view('admin.spcrud.suasp', compact('hoa', 'danhmuc'));
}

function update(Request $request, $id) {
    $request->validate([
        'tenhoa' => 'required',
        'gia' => 'required|numeric',
        'mota' => 'required',
        'id_dm' => 'required|exists:danhmuc,id_dm',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  
    ]);

    $hoa = hoa::findOrFail($id);
    $hoa->tenhoa = $request->tenhoa;
    $hoa->gia = $request->gia;
    $hoa->mota = $request->mota;
    $hoa->id_dm = $request->id_dm;

    
    if ($request->hasFile('img')) {
        if ($hoa->img) {
            $oldImagePath = public_path('img/' . $hoa->img);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); 
            }
        }
        $imageName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('img'), $imageName);
        $hoa->img = $imageName; 
    }
    $hoa->save(); 
    return redirect()->route('qlsp')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}
   public function destroy($id)
   {
       $hoa = hoa::findOrFail($id); 
       $hoa->delete(); 
   
       return redirect()->route('qlsp')->with('success', 'Sản phẩm đã được xóa thành công.');
   }
   function qldm(){
       $danhmuc = danhmuc::all(); 
       return view('admin.qldanhmuc',compact('danhmuc'));
   }
   function themdm(){
       return view('admin.dmcrud.themdm');
   }
   function dmadd(Request $request){
       $request->validate([
           'ten_dm' => 'required',
       ]);
        danhmuc::create([
       'ten_dm' => $request->ten_dm,
       
   ]);
       return redirect()->route('qldm')->with('success', 'Sản phẩm đã được thêm thành công.');
   }
   
   function dmedit($id)
   {
       $danhmuc = DanhMuc::findOrFail($id);
       return view('admin.dmcrud.suadm', compact('danhmuc'));
   }
   public function dmupdate(Request $request, $id) {
       $request->validate([
           'ten_dm' => 'required',
           
       ]);
   
       $danhmuc = danhmuc::findOrFail($id);
       $danhmuc->ten_dm = $request->ten_dm;
       $danhmuc->save(); 
       return redirect()->route('qldm')->with('success', 'Sản phẩm đã được cập nhật thành công.');
   }
   function dmdestroy($id)
   {
       $danhmuc = DanhMuc::findOrFail($id);
       $danhmuc->delete();
       return redirect()->route('qldm')->with('success', 'Danh mục đã được xóa thành công.');
   }
function getuser(){
    $user = nguoidung::all();
    return  view('admin.qltaikhoan', compact('user'));
}
}
