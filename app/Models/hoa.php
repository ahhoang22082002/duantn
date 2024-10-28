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
    // Giả sử bạn đã lưu thông tin giỏ hàng trong session
    $carts = session()->get('carts', []);

    $subtotal = 0;
    $total = 0;

    // Tính toán subtotal và total
    foreach ($carts as $item) {
        $subtotal += $item->gia * $item->soluong; // Tính subtotal
        $total += $subtotal; // Nếu có tính phí vận chuyển hoặc giảm giá, bạn có thể thêm vào đây
    }

    return view('carts', compact('carts', 'subtotal', 'total'));
}
}
