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
        Schema::create('t_penjualan', function (Blueprint $table) {
            $table->integer('id_penjualan')->autoIncrement()->primary();
            $table->string('kode_transaksi', 50);
            $table->date('tgl_transaksi');
            $table->integer('id_user');
            $table->integer('id_pelanggan');
            $table->decimal('total', 12, 2);
            $table->decimal('bayar', 12, 2);
            $table->decimal('kembalian', 12, 2);
            $table->timestamps();

            // Relasi foreign key
            $table->foreign('id_user')->references('id_user')->on('t_users')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('t_pelanggan')->onDelete('cascade');
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
