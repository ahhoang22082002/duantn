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
        Schema::create('nguoidung', function (Blueprint $table) {
            $table->increments('id_nguoi'); 
            $table->string('ten'); 
            $table->string('matkhau'); 
            $table->string('email')->unique(); 
            $table->string('diachi'); 
            $table->bigInteger('sdt'); 
            $table->tinyInteger('role')->default(0);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoidung');
    }
};
