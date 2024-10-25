<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DanhMuc;

class danhmucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DanhMuc::create([
            'ten_dm' => 'Hoa Sinh Nhật',
        ]);
        DanhMuc::create([
            'ten_dm' => 'Hoa Khai Trương',
        ]);
        DanhMuc::create([
            'ten_dm' => 'Hoa Tang Lễ',
        ]);
        DanhMuc::create([
            'ten_dm' => 'Hoa Giỏ/Hộp Gỗ',
        ]);
        DanhMuc::create([
            'ten_dm' => 'Hoa Bó',
        ]);
        DanhMuc::create([
            'ten_dm' => 'Hoa Cắm Bình',
        ]);
    }
}
