<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    protected $table = 't_penjualan';
    protected $primaryKey = 'id_penjualan';
    public $timestamps = true;

    protected $fillable = [
        'id_user',
        'id_pelanggan',
        'tanggal',
        'total',
        'bayar',
        'kembalian'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pelanggan()
    {
        return $this->belongsTo(PelangganModel::class, 'id_pelanggan');
    }

    public function detailPenjualan()
    {
        return $this->hasMany(DetailPenjualanModel::class, 'id_penjualan');
    }
}

