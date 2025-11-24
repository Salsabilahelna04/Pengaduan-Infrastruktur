<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
    'name',
    'email',
    'password',
    'address',
    'phone',
    'role',
    'foto'
];
            

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function laporan()
    {
        return $this->hasMany(Laporan::class, 'id_warga');
    }
}
