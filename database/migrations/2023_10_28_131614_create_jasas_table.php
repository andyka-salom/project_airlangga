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
        Schema::create('jasas', function (Blueprint $table) {
            $table->id('id_jasa')->increments();
            $table->string('nama_jasa',100);
            $table->string('deskripsi_jasa',300);
            $table->timestamps();
            $table->string('image')->nullable();
            
            $table->unsignedBigInteger('id_categories');
            $table->foreign('id_categories')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jasas');
    }
};
