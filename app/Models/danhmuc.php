<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    use HasFactory;
    protected $table = 'danhmuc';
    protected $primaryKey = 'id_dm';
    protected $fillable = [
        'tendm',
       
    ];
    public function hoa()
{
    return $this->hasMany(Hoa::class, 'id_dm', 'id_dm');
}

}
