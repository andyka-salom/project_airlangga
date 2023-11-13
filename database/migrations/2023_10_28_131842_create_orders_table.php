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
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->increments();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('provider_id');
            $table->string('nama_penyedia');
            $table->string('nama_customer');
            $table->date('order_date');
            $table->bigInteger('total_bayar');
            $table->enum('status', ['Unpaid', 'Paid']);
            $table->enum('status_selesai', ['belum','selesai']);
            $table->string('Alamat');
            $table->string('phone',12);
            $table->timestamps();
    
            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('provider_id')->references('id_provider')->on('profilpenyedia_jasas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
