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
    Schema::create('verification_requests', function (Blueprint $table) {
        $table->id('id_verif'); // Change 'id_verif' to 'id' for auto-increment primary key
        $table->unsignedBigInteger('provider_id');
        $table->enum('status', ['daftar', 'pending', 'approved']);
        $table->timestamps();
        
        $table->foreign('provider_id')->references('id_provider')->on('profilpenyedia_jasas');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verification_requests');
    }
};
