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
        Schema::create('t_detail_penjualan', function (Blueprint $table) {
            $table->integer('id_detail')->autoIncrement()->primary();
            $table->integer('id_penjualan');
            $table->integer('id_produk');
            $table->decimal('harga', 12, 2);
            $table->integer('qyt');
            $table->decimal('subtotal', 12, 2);
            // Relasi foreign key
            $table->foreign('id_penjualan')->references('id_penjualan')->on('t_penjualan')->onDelete('cascade');
            $table->foreign('id_produk')->references('id_produk')->on('t_produk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
