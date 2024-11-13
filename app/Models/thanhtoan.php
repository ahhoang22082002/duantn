<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class thanhtoan extends Model
{
    use HasFactory;

    protected $table = 'thanhtoan'; 
    protected $primaryKey = 'id_tt'; 

    protected $fillable = [
        'trangthaitt',  
    ];

}
