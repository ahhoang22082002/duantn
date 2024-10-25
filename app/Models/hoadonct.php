<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoadonct extends Model
{
    use HasFactory;
    protected $table = 'hoadonct';
    protected $primaryKey = 'id_hoadonct';

    protected $fillable = [
        'id_hoadon',
        'id_hoa',
        'soluong',
        'gia',
        'id_km',
        'id_danhgia',
    ];
    public function hoa()
    {
        return $this->belongsTo(Hoa::class, 'id_hoa', 'id_hoa');
    }
    public function khuyenmai()
    {
        return $this->belongsTo(khuyenmai::class, 'id_km', 'id_km');
    }
    public function danhgia(){
        return $this->belongsTo(danhgia::class,'id_danhgia','id_danhgia');
    }
    public function hoadon()
    {
        return $this->belongsTo(HoaDon::class, 'id_hoadon', 'id_hoadon');
    }
}
