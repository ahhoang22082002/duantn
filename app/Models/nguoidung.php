<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class nguoidung extends Authenticatable
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

   
     function getRoleNameAttribute()
    {
        return $this->role == 0 ? 'Khách hàng' : 'Admin';
    }


    public function getAuthPassword()
    {
        return $this->attributes['matkhau']; 
    }
    
}
