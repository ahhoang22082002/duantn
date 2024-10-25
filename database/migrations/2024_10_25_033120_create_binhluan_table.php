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
        Schema::create('binhluan', function (Blueprint $table) {
            $table->increments('id_bl'); 
            $table->unsignedInteger('id_hoa');
            $table->text('binhluan'); 
            $table->unsignedInteger('id_nguoi');
            $table->timestamps(); 

           
            $table->foreign('id_hoa')
            ->references('id_hoa')
            ->on('hoa')
            ->onDelete('cascade');

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
        Schema::dropIfExists('binhluan');
    }
};
