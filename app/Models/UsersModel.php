<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    
    protected $table = 't_users';
    protected $primaryKey = 'id_user';
    public $timestamps = true;

    protected $fillable = [
        'nama_user',
        'username',
        'password',
        'role',
    ];
    protected $hidden = ['password'];
    public function penjualan()
    {
        return $this->hasMany(penjualanModel::class, 'id_user');
    }
}
