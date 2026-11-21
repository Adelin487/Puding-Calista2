<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->unique();
            $table->string('nama');
            $table->string('whatsapp', 20);
            $table->date('tanggal');
            $table->string('waktu', 20);
            $table->text('catatan')->nullable();
            $table->unsignedInteger('total_harga');
            $table->string('status')->default('Menunggu Konfirmasi');
            $table->string('bukti_bayar_url')->nullable();
            $table->string('bukti_bayar_name')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};