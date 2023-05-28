<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'users';
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'cargo',
        'foto',
        'rol_id',
        'area_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'ca_idUsuario',
        'ca_tipo',
        'ca_estado',
        'created_at',
        'updated_at',
        'email_verified_at',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

