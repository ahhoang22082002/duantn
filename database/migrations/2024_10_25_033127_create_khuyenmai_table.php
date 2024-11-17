<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('khuyenmai', function (Blueprint $table) {
            $table->increments('id_km'); 
            $table->string('ma_khuyenmai')->unique(); 
            $table->tinyInteger('phantramgiam');
            $table->date('ngay_bat_dau'); 
            $table->date('ngay_ket_thuc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khuyenmai');
    }
};
