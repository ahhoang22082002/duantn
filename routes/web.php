<?php


use App\Http\Controllers\homecontroller;
use App\Http\Controllers\hoacontroller;
use Illuminate\Support\Facades\Route;





// Route::get('/')
Route::get('/',[homecontroller::class,'spmoi'])->name('trangchu');
Route::get('/baiviet',[homecontroller::class,'baiviet'])->name('baiviet');
Route::get('/lienhe',[homecontroller::class,'lienhe'])->name('lienhe');
Route::get('/gioithieu',[homecontroller::class,'gioithieu'])->name('gioithieu');

Route::get('/cuahang',[hoacontroller::class,'shop'])->name('cuahang');
Route::get('/cuahang/{id_hoa}',[hoacontroller::class,'chitiethoa'])->name('cuahang.chitiet');
Route::get('/cuahang/danhmuc/{id_dm}',[hoacontroller::class,'sptheodm'])->name('cuahang.danhmuc');

Route::get('/ad',[homecontroller::class,'dashboard'])->name('ad');