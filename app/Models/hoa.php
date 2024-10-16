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
}
