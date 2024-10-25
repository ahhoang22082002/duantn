<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nguoidung extends Model
{
    use HasFactory;
    protected $table = 'nguoidung';
    protected $primaryKey = 'id_nguoi';

    protected $fillable = [
        'ten',
        'matkhau',
        'email',
        'diachi',
        'sdt',
        'role',
    ];
    

}
