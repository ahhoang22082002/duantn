<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    use HasFactory;
    protected $table = 'hoadon';
    protected $primaryKey = 'id_hoadon';

    protected $fillable = [
        'id_nguoi',
        'ten',
        'ngaydat',
        'trangthai',
        'phuongthuctt',
        'tongtien',
    ];
   public function nguoidung(){
    return $this->belongsTo(nguoidung::class, 'id_nguoi', 'id_nguoi');
   }
   public function hoadonct()
   {
       return $this->hasMany(HoaDonCT::class, 'id_hoadon', 'id_hoadon');
   }
   
}
