<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualanModel extends Model
{
    protected $table = 't_detail_penjualan';
    protected $primaryKey = 'id_detail';
    public $timestamps = true;

    protected $fillable = [
        'id_penjualan',
        'id_produk',
        'qyt',
        'harga',
        'subtotal',
    ];

    public function penjualan()
    {
        return $this->belongsTo(penjualanModel::class, 'id_penjualan');
    }

    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk');
    }
}
