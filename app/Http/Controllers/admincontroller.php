<?php

namespace App\Http\Controllers;
use App\Models\hoa;
use App\Models\donhang;
use App\Models\danhmuc;
use App\Models\nguoidung;
use App\Models\thanhtoan;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    function dashboard( ){
        $sales = 0;
        $tongsanpham = hoa::count();
        $tongtaikhoan = nguoidung::count();
        $tongdanhmuc = danhmuc::count();
        $tongdonhang = donhang::count();
      
    
    return view('admin.dashboard',  compact('tongsanpham','sales','tongtaikhoan','tongdanhmuc','tongdonhang'));
    }
   function qlsp(){
    $hoa = hoa::select('id_hoa', 'id_dm', 'tenhoa', 'gia', 'img')
    ->orderBy('id_hoa', 'desc')
    ->paginate(9);
    $tongsanpham = hoa::count(); 
    return view('admin.sanpham.qlsanpham', compact('hoa','tongsanpham'));

   }

   function themsp(){
    $danhmuc = danhmuc::all(); 
    return view('admin.sanpham.themsp',compact('danhmuc'));
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
    return view('admin.sanpham.suasp', compact('hoa', 'danhmuc'));
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
    function destroy($id)
   {
       $hoa = hoa::findOrFail($id); 
       $hoa->delete(); 
   
       return redirect()->route('qlsp')->with('success', 'Sản phẩm đã được xóa thành công.');
   }
   function qldm(){
       $danhmuc = danhmuc::all(); 
       return view('admin.danhmuc.qldanhmuc',compact('danhmuc'));
   }
   function themdm(){
       return view('admin.danhmuc.themdm');
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
       return view('admin.danhmuc.suadm', compact('danhmuc'));
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
    $user = nguoidung::all();// ->paginate(9);
    return  view('admin.taikhoan.qltaikhoan', compact('user'));
}
function xoatk($id){
    $user = Nguoidung::find($id); 

        if ($user) {
            $user->delete(); 
            return redirect()->back()->with('success', 'Tài khoản đã được xóa thành công.');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy tài khoản.');
        }
}
function phanquyen($id)
{
    $user = Nguoidung::find($id);

    if ($user) {
        return view('admin.taikhoan.phanquyen', compact('user'));
    } else {
        return redirect()->back()->with('error', 'Không tìm thấy tài khoản.');
    }
}

function doiquyen(Request $request, $id)
{
    $user = Nguoidung::find($id);

    if ($user) {
        $user->role = $request->role; 
        $user->save();
        
        return redirect()->route('qltk')->with('success', 'Phân quyền thành công.');
    } else {
        return redirect()->back()->with('error', 'Không tìm thấy tài khoản.');
    }
}

function showdonhang(){
    $donhang = Donhang::with(['nguoidung', 'donhangct.hoa'])
    ->paginate(5);
    return view('admin.donhang.qldonhang',compact('donhang'));
}
function xoadh($id){
    $dh = donhang::find($id); 

        if ($dh) {
            $dh->delete(); 
            return redirect()->back()->with('success', 'Đơn hàng đã được xóa thành công.');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy tài khoản.');
        }
}
function dhedit($id){

        $donhang= donhang::findOrFail($id);
         
        return view('admin.donhang.suadh', compact('donhang'));
    
}
function dhupdate(Request $request, $id)
{
    $donhang = Donhang::find($id);
    if ($donhang) {
        $donhang->trangthai = $request->trangthai;
        $donhang->id_tt=$request->id_tt;
        $donhang->save();
        return redirect()->route('qldh')->with('success', 'Cập nhật thành công.');
    } else {
        return redirect()->back()->with('error', 'Không tìm thấy đơn hàng.');
    }
}


public function filterStatistics(Request $request)
{
    $tongsanpham = Hoa::count();
    $tongtaikhoan = Nguoidung::count();
    $tongdanhmuc = Danhmuc::count();
    $tongdonhang = Donhang::count();
    $sales = 0;
    // Lọc theo ngày
    if ($request->has('date') && $request->input('date')) {
        $date = $request->input('date');
        $sales = Donhang::whereDate('ngaydat', $date)->sum('tongtien');
    }

    // Lọc theo tháng
    elseif ($request->has('month') && $request->input('month')) {
        $month = $request->input('month');
        $year = $request->input('year') ?: date('Y');
        $sales = Donhang::whereMonth('ngaydat', $month)
                         ->whereYear('ngaydat', $year)
                         ->sum('tongtien');
    }

    // Lọc theo năm
    elseif ($request->has('year') && $request->input('year')) {
        $year = $request->input('year');
        $sales = Donhang::whereYear('ngaydat', $year)->sum('tongtien');
    }

    // Nếu không có bộ lọc, lấy doanh thu tổng
    else {
        $sales  = Donhang::sum('tongtien');
    }

    return view('admin.dashboard', compact('sales','tongsanpham', 'tongtaikhoan', 'tongdanhmuc', 'tongdonhang'));
}

}
