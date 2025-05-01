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
        Schema::create('t_produk', function (Blueprint $table) {
            $table->integer('id_produk')->primary()->autoIncrement();
            $table->string('nama_produk', 100);
            $table->decimal('harga_produk', 12, 2);
            $table->text('deskripsi')->nullable();
            $table->integer('stok_produk');
            $table->enum('satuan', [
                'pcs',
                'pak',
                'dus',
                'box',
                'botol',
                'sachet',
                'kg',
                'gram',
                'liter',
                'ml',
                'meter',
                'roll',
                'lusin',
                'rim',
                'pasang'
            ]);
            $table->timestamps();
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
