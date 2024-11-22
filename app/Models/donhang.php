<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class donhang extends Model
    {
        use HasFactory;
        protected $table = 'donhang';
        protected $primaryKey = 'id_donhang';

        protected $fillable = [
            'id_nguoi',
            'ten',
            'email',
            'diachi',
            'sdt',
            'ngaydat',
            'trangthai',
            'phuongthuctt',
            'tongtien',
            'id_tt'
        ];
    public function nguoidung(){
        return $this->belongsTo(nguoidung::class, 'id_nguoi', 'id_nguoi');
    }
    public function donhangct()
    {
        return $this->hasMany(donhangct::class, 'id_donhang', 'id_donhang');
    }
    public function thanhtoan()
    {
        return $this->belongsTo(thanhtoan::class, 'id_tt', 'id_tt');
    }
    
    }
