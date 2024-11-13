<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoakhuyenmai extends Model
{
    use HasFactory;
    protected $table = 'hoakhuyenmai';
    protected $fillable = [
        'id_hoa',
        'id_km',
    ];

   
    public function khuyenmai()
    {
        return $this->belongsTo(KhuyenMai::class, 'id_km', 'id_km');
    }

  
    public function hoa()
    {
        return $this->belongsTo(Hoa::class, 'id_hoa', 'id_hoa');
    }
  
}
