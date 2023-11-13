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
        Schema::create('profilpenyedia_jasas', function (Blueprint $table) {
            $table->id('id_provider')->increments();
            $table->string('nama_toko');
            $table->string('photo');
            $table->string('address');
            $table->text('description');
            $table->unsignedBigInteger('no_rek')->nullable();
            $table->unsignedBigInteger('Harga');
            $table->enum('status', ['daftar', 'pending', 'approved']);
            $table->unsignedBigInteger('id_jasa');
            $table->foreign('id_jasa')->references('id_jasa')->on('jasas');

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profilpenyedia_jasas');
    }
};
