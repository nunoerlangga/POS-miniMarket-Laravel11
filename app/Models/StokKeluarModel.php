<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokKeluarModel extends Model
{
    protected $table = 't_stok_keluar';
    protected $primaryKey = 'id_stok_keluar';
    public $timestamps = true;

    protected $fillable = [
        'id_produk',
        'jumlah',
        'tgl_keluar',
        'alasan',
    ];

    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk');
    }
}
