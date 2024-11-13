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
        Schema::create('donhang', function (Blueprint $table) {
            $table->increments('id_donhang'); 
            $table->unsignedInteger('id_nguoi');
            $table->unsignedInteger('id_tt');
            $table->string('ten');
            $table->date('ngaydat'); 
            $table->string('trangthai'); 
            $table->string('phuongthuctt'); 
            $table->decimal('tongtien', 10); 
            $table->timestamps();  

            $table->foreign('id_nguoi')
            ->references('id_nguoi')
            ->on('nguoidung')
            ->onDelete('cascade');
            
            $table->foreign('id_tt')
            ->references('id_tt')
            ->on('thanhtoan')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donhang');
    }
};
