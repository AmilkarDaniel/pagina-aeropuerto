<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    use HasFactory;

    public $table = 'aeropuertos';

    protected $fillable = [
        'nombre',
    ];

    protected $hidden = [
        'ca_idUsuario',
        'ca_tipo',
        'ca_estado',
        'created_at',
        'updated_at',
    ];
}
