<?php


use App\Http\Controllers\homecontroller;
use App\Http\Controllers\hoacontroller;
use App\Http\Controllers\thanhtoancontroller;
use App\Http\Controllers\cartcontroller;
use App\Http\Controllers\donhangcontroller;
use App\Http\Controllers\admincontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;




// Route::get('/')
Route::get('/',[homecontroller::class,'sp'])->name('trangchu');
Route::get('/baiviet',[homecontroller::class,'baiviet'])->name('baiviet');
Route::get('/lienhe',[homecontroller::class,'lienhe'])->name('lienhe');
Route::get('/gioithieu',[homecontroller::class,'gioithieu'])->name('gioithieu');


Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/add', [CartController::class, 'cartadd'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'cartremove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'updatecart'])->name('cart.update');
Route::post('/thanhtoan/muangay', [CartController::class, 'muangay'])->name('thanhtoan.muangay');
Route::post('/cus/order-submit', [thanhtoancontroller::class, 'cus_submitorder'])->name('cusorder.submit');
Route::get('/cus/thanhtoan',[thanhtoancontroller::class,'cus_showtt'])->name('custhanhtoan');
Route::middleware(['auth'])->group(function () {
    Route::post('/cart/km', [CartController::class, 'apdungkm'])->name('cart.khuyenmai');
    Route::post('/order-submit', [thanhtoancontroller::class, 'submitorder'])->name('order.submit');
    Route::get('/thanhtoan',[thanhtoancontroller::class,'showtt'])->name('thanhtoan');
    Route::get('/payment/return', [thanhtoancontroller::class, 'paymentReturn'])->name('payment.return');
   Route::get('/taikhoan',[Authcontroller::class,'taikhoan'])->name('taikhoan');
   Route::get('/taikhoan/donhang',[Donhangcontroller::class,'donhanguser'])->name('taikhoan.donhang');
   Route::post('/capnhattaikhoan', [Authcontroller::class, 'capnhattaikhoan'])->name('capnhattaikhoan');


    Route::get('/ad/qltk',[admincontroller::class,'getuser'])->name('qltk');
    Route::delete('/ad/qltk/delete/{id}', [AdminController::class, 'xoatk'])->name('qltk.delete');
    Route::get('/ad/qltk/phanquyen/{id}', [AdminController::class, 'phanquyen'])->name('qltk.phanquyen');
    Route::post('/ad/qltk/phanquyen/{id}', [AdminController::class, 'doiquyen'])->name('qltk.doiquyen');

    Route::get('/ad/qldh',[admincontroller::class,'showdonhang'])->name('qldh');
    Route::delete('/ad/qldh/delete/{id}', [AdminController::class, 'xoadh'])->name('qldh.delete');
    Route::post('/donhang/update/{id}', [admincontroller::class, 'dhupdate'])->name('qldh.update');
    Route::get('/donhang/search', [donhangcontroller::class, 'dhsearch'])->name('qldh.search');

    Route::get('/ad', [AdminController::class, 'dashboard'])->name('ad');
    Route::post('/ad/thongke', [AdminController::class, 'filterStatistics'])->name('ad.sta');

    Route::get('/ad/qlsp',[admincontroller::class,'qlsp'])->name('qlsp');
    Route::get('/ad/km',[admincontroller::class,'khuyenmai'])->name('km');
    Route::post('/ad/taokm',[admincontroller::class,'taokm'])->name('taokm');
    Route::delete('/deletekm/{id}', [admincontroller::class, 'destroykm'])->name('km.delete');
    Route::get('/ad/qldm',[admincontroller::class,'qldm'])->name('qldm');
    Route::get('/themsp',[admincontroller::class,'themsp'])->name('themsp');
    Route::post('/add', [admincontroller::class, 'add'])->name('add'); 
    Route::get('/edit/{id}', [admincontroller::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [admincontroller::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [admincontroller::class, 'destroy'])->name('delete');

    
    Route::get('/themdm', [adminController::class, 'themdm'])->name('themdm');
    Route::post('/dmadd', [admincontroller::class, 'dmadd'])->name('dmadd'); 
    Route::get('/dmedit/{id}', [adminController::class, 'dmedit'])->name('dmedit');
    Route::post('/dmupdate/{id}', [admincontroller::class, 'dmupdate'])->name('dmupdate');
    Route::delete('/danhmuc/delete/{id}', [admincontroller::class, 'dmdestroy'])->name('dmdelete');
    Route::get('/dhedit/{id}', [admincontroller::class, 'dhedit'])->name('qldh.edit');
    
    });
Route::get('/test',[thanhtoancontroller::class,'test'])->name('test');
Route::get('/cuahang',[hoacontroller::class,'shop'])->name('cuahang');
Route::get('/cuahang/{id_hoa}',[hoacontroller::class,'chitiethoa'])->name('cuahang.chitiet');
Route::get('/cuahang/danhmuc/{id_dm}',[hoacontroller::class,'sptheodm'])->name('cuahang.danhmuc');
Route::get('/search', [hoacontroller::class, 'search'])->name('hoa.search');










Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');



