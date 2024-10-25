<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class binhluan extends Model
{
    use HasFactory;
    protected $table = 'binhluan';
    protected $primaryKey = 'id_bl';
    protected $fillable = [
        'id_hoa',
        'binhluan',
       'id_nguoi',
    ];
    public function hoa()
    {
        return $this->belongsTo(Hoa::class, 'id_hoa', 'id_hoa');
    }

    
    public function nguoidung()
    {
        return $this->belongsTo(nguoidung::class, 'id_nguoi', 'id_nguoi');
    }
}
