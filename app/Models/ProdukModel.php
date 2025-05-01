<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    protected $table = 't_produk';
    protected $primaryKey = 'id_produk';
    public $timestamps = true;

    protected $fillable = [
        'nama_produk',
        'satuan',
        'deskripsi',
        'harga_produk',
        'stok',
    ];
    public function stokKeluar()
    {
        return $this->hasMany(StokKeluarModel::class, 'id_produk');
    }

    public function stokMasuk()
    {
        return $this->hasMany(StokMasukModel::class, 'id_produk');
    }
}
