<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PelangganModel extends Model
{
    protected $table = 't_pelanggan';
    protected $primaryKey = 'id_pelanggan';
    public $timestamps = true;

    protected $fillable = [
        'nama_pelanggan',
        'alamat',
        'no_hp',
    ];

    public function penjualan()
    {
        return $this->hasMany(PenjualanModel::class, 'id_pelanggan');
    }
}
