<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokMasukModel extends Model
{
    protected $table = 't_stok_masuk';
    protected $primaryKey = 'id_stok_masuk';
    public $timestamps = true;

    protected $fillable = [
        'id_produk',
        'jumlah',
        'tgl_masuk',
    ];

    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk');
    }
}
