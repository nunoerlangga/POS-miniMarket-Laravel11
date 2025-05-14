<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UsersModel extends Authenticatable
{
    use Notifiable,HasFactory;
    
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
