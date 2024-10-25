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
        Schema::create('hoadon', function (Blueprint $table) {
            $table->increments('id_hoadon'); 
            $table->unsignedInteger('id_nguoi');
            $table->string('ten');
            $table->date('ngaydat'); 
            $table->string('trangthai'); 
            $table->string('phuongthuctt'); 
            $table->decimal('tongtien', 10, 2); 
            $table->timestamps();  

            $table->foreign('id_nguoi')
            ->references('id_nguoi')
            ->on('nguoidung')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoadon');
    }
};
