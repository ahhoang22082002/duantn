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
Route::get('/',[homecontroller::class,'spmoi'])->name('trangchu');
Route::get('/baiviet',[homecontroller::class,'baiviet'])->name('baiviet');
Route::get('/lienhe',[homecontroller::class,'lienhe'])->name('lienhe');
Route::get('/gioithieu',[homecontroller::class,'gioithieu'])->name('gioithieu');



Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'cartadd'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'cartremove'])->name('cart.remove');
    Route::post('/cart/update', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::get('/donhang', [CartController::class, 'orderForm'])->name('order.form');
    Route::post('/order-submit', [donhangcontroller::class, 'submitOrder'])->name('order.submit');
    Route::get('/thanhtoan',[thanhtoancontroller::class,'showtt'])->name('thanhtoan');
  
});

Route::get('/cuahang',[hoacontroller::class,'shop'])->name('cuahang');
Route::get('/cuahang/{id_hoa}',[hoacontroller::class,'chitiethoa'])->name('cuahang.chitiet');
Route::get('/cuahang/danhmuc/{id_dm}',[hoacontroller::class,'sptheodm'])->name('cuahang.danhmuc');
Route::get('/search', [hoacontroller::class, 'search'])->name('hoa.search');




Route::get('/ad/qltk',[admincontroller::class,'getuser'])->name('qltk');
Route::get('/ad',[admincontroller::class,'dashboard'])->name('ad');
Route::get('/ad/qlsp',[admincontroller::class,'qlsp'])->name('qlsp');
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
Route::delete('/danh-muc/delete/{id}', [admincontroller::class, 'dmdestroy'])->name('dmdelete');






Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');



