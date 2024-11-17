<?php

namespace App\Http\Controllers;
use App\Models\hoa;
use App\Models\donhang;
use App\Models\danhmuc;
use App\Models\nguoidung;
use App\Models\donhangct;
use App\Models\khuyenmai;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    function dashboard( ){
        $sales = donhang::sum('tongtien');
        $tongsanpham = hoa::count();
        $tongtaikhoan = nguoidung::count();
        $tongdanhmuc = danhmuc::count();
        $tongdonhang = donhang::count();
        $hot = donhangct::select('hoa.id_hoa', 'hoa.tenhoa', 'hoa.gia',DB::raw('SUM(donhangct.soluong) as total_sold'))
        ->join('hoa', 'donhangct.id_hoa', '=', 'hoa.id_hoa')
        ->groupBy('hoa.id_hoa', 'hoa.tenhoa', 'hoa.gia')
        ->orderByDesc('total_sold')
        ->limit(5)
        ->get();
        $month = donhang::whereMonth('ngaydat',date('m'))
        ->whereYear('ngaydat', date('Y'))   
        ->sum('tongtien');
        $weeklySales = [];
        $daysOfWeek = [''];
        $startOfWeek = Carbon::now()->startOfWeek();

        for ($i = 0; $i < 7; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            $daysOfWeek = [ 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy','Chủ Nhật'];
            $weeklySales[] = Donhang::whereDate('ngaydat', $date)->sum('tongtien');
        }
    
    return view('admin.dashboard',  compact('tongsanpham','sales','tongtaikhoan','tongdanhmuc','tongdonhang','hot','month','weeklySales', 'daysOfWeek'));
    }
    function filterStatistics(Request $request)
{
    $tongsanpham = Hoa::count();
    $tongtaikhoan = Nguoidung::count();
    $tongdanhmuc = Danhmuc::count();
    $tongdonhang = Donhang::count();
    $sales = Donhang::sum('tongtien');
    $month = donhang::whereMonth('ngaydat',date('m'))
    ->whereYear('ngaydat', date('Y'))   
    ->sum('tongtien');
    $hot = donhangct::select('hoa.id_hoa', 'hoa.tenhoa', 'hoa.gia',DB::raw('SUM(donhangct.soluong) as total_sold'))
        ->join('hoa', 'donhangct.id_hoa', '=', 'hoa.id_hoa')
        ->groupBy('hoa.id_hoa', 'hoa.tenhoa', 'hoa.gia')
        ->orderByDesc('total_sold')
        ->limit(5)
        ->get();
    if ($request->has('date') && $request->input('date')) {
        $date = $request->input('date');
        $sales = Donhang::whereDate('ngaydat', $date)->sum('tongtien');
    }
    else {
        $sales  = Donhang::sum('tongtien');
    }
    $weeklySales = [];
    $daysOfWeek = [''];
    $startOfWeek = Carbon::now()->startOfWeek();

    for ($i = 0; $i < 7; $i++) {
        $date = $startOfWeek->copy()->addDays($i);
        $daysOfWeek = [ 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy','Chủ Nhật'];
        $weeklySales[] = Donhang::whereDate('ngaydat', $date)->sum('tongtien');
    }
    return view('admin.dashboard', compact('sales','tongsanpham', 'tongtaikhoan', 'tongdanhmuc', 'tongdonhang','hot','month','weeklySales', 'daysOfWeek'));
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


function khuyenmai(){
    $km=khuyenmai::all();
    return view('admin.sanpham.khuyenmai',compact('km'));
}
function taokm(Request $request){
    $request->validate([
        'code' => 'required|unique:khuyenmai,ma_khuyenmai',
        'discount_value' => 'required|numeric|min:1|max:100',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
    ]);
    $khuyenMai = KhuyenMai::create([
        'ma_khuyenmai' => $request->code,
        'phantramgiam' => $request->discount_value,
        'ngay_bat_dau' => $request->start_date,
        'ngay_ket_thuc' => $request->end_date,
    ]);
    session()->flash('success', 'Mã giảm giá đã được tạo thành công!');
    return redirect()->back();
}



function destroykm($id)
   {
       $km = khuyenmai::findOrFail($id); 
       $km->delete(); 
   
       return redirect()->route('km')->with('success', 'Mã giảm giá đã được xóa thành công.');
   }
}

