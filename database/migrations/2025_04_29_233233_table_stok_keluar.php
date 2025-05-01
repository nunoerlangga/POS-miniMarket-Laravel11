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
        Schema::create('t_stok_keluar', function (Blueprint $table) {
            $table->integer('id_stok_keluar')->autoIncrement()->primary();
            $table->integer('id_produk');
            $table->integer('jumlah');
            $table->date('tgl_keluar');
            $table->text('alasan');
            $table->integer('id_user');

            // Relasi foreign key
            $table->foreign('id_produk')->references('id_produk')->on('t_produk')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('t_users')->onDelete('cascade');
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
