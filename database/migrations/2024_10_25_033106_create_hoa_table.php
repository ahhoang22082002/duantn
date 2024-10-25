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
        Schema::create('hoa', function (Blueprint $table) {
            $table->increments('id_hoa'); 
            $table->unsignedInteger('id_dm'); 
            $table->string('tenhoa'); 
            $table->text('mota');
            $table->decimal('gia', 8,0); 
            $table->string('img'); 
            $table->timestamps(); 

            $table->foreign('id_dm')
                  ->references('id_dm')
                  ->on('danhmuc')
                  ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa');
    }
};
