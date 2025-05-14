<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_produk')->insert([
            [
                'nama_produk' => 'Kopi ABC',
                'harga_produk' => 5000,
                'deskripsi' => 'Kopi sachet instan',
                'stok_produk' => 100,
                'satuan' => 'sachet',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_produk' => 'Gula Pasir',
                'harga_produk' => 15000,
                'deskripsi' => 'Gula pasir 1kg',
                'stok_produk' => 50,
                'satuan' => 'kg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
