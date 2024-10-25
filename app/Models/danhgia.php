<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhgia extends Model
{
    use HasFactory;
    protected $table = 'danhgia';
    protected $primaryKey = 'id_danhgia';

    protected $fillable = [
        'mota',
        'sosao',
       
    ];
    public function hoa()
    {
        return $this->belongsTo(Hoa::class, 'id_hoa', 'id_hoa');
    }
    public function km()
    {
        return $this->belongsTo(khuyenmai::class, 'id_km', 'id_km');
    }
    public function danhgia(){
        return $this->belongsTo(danhgia::class,'id_danhgia','id_danhgia');
    }
}
