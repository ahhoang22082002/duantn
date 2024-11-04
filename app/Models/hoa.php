<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoa extends Model
{
    use HasFactory;
    protected $table = 'hoa';
    protected $primaryKey = 'id_hoa';
    protected $fillable = [
        'id_dm',
        'tenhoa',
        'mota',
        'gia',
        'img',
    ];
    public function danhmuc()
{
    return $this->belongsTo(DanhMuc::class, 'id_dm', 'id_dm');
}
public function showCart()
{
   
    $carts = session()->get('carts', []);

    $subtotal = 0;
    $total = 0;


    foreach ($carts as $item) {
        $subtotal += $item->gia * $item->soluong; 
        $total += $subtotal; 
    }

    return view('carts', compact('carts', 'subtotal', 'total'));
}
}
