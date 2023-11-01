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
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id('id_avaibility')->increments();
            $table->unsignedBigInteger('provider_id');
            $table->date('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

            $table->foreign('provider_id')->references('id_provider')->on('profilpenyedia_jasas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
