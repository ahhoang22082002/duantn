<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khuyenmai extends Model
{
    use HasFactory;
    protected $table = 'khuyenmai';
    protected $primaryKey = 'id_km';

    protected $fillable = [
        'ma_khuyenmai',
        'phantramgiam',
        'ngay_bat_dau',
        'ngay_ket_thuc',
    ];
   
   
   
}
