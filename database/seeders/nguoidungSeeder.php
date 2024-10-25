<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\nguoidung;
use Illuminate\Support\Facades\Hash;
class nguoidungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NguoiDung::create([
            'ten' => 'Tuấn Anh',
            'matkhau' =>  Hash::make('12208890'), 
            'email' => 'ahhoang22082002@gmail.com',
            'diachi' => '12/3 đường số 4,...',
            'sdt' => '0362312034',
            'role' => 1, 
        ]);
        NguoiDung::create([
            'ten' => 'Admin',
            'matkhau' =>  Hash::make('123456789'), 
            'email' => 'admin@gmail.com',
            'diachi' => '12/3 đường số 4,...',
            'sdt' => '0123456789',
            'role' => 1, 
        ]);
        NguoiDung::create([
            'ten' => 'anhtuan',
            'matkhau' =>  Hash::make('123456789'), 
            'email' => 'ahhoang2208@gmail.com',
            'diachi' => '12/3 đường số 4,...',
            'sdt' => '0123456789',
            'role' => 0, 
        ]);
    }
}
