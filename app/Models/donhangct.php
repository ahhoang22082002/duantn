<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Nullable;

class donhangct extends Model
{
    use HasFactory;
    protected $table = 'donhangct';
    protected $primaryKey = 'id_donhangct';

    protected $fillable = [
        'id_donhang',
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
    public function donhang()
    {
        return $this->belongsTo(donhang::class, 'id_donhang', 'id_donhang');
    }
}
