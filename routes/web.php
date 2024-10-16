<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\hoacontroller;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[homecontroller::class,'spmoi'])->name('trangchu');
Route::get('/baiviet',[homecontroller::class,'baiviet'])->name('baiviet');
Route::get('/lienhe',[homecontroller::class,'lienhe'])->name('lienhe');
Route::get('/gioithieu',[homecontroller::class,'gioithieu'])->name('gioithieu');

Route::get('/cuahang',[hoacontroller::class,'allsp'])->name('cuahang');
Route::get('/cuahang/{id_hoa}',[hoacontroller::class,'chitiethoa'])->name('cuahang.chitiet');

