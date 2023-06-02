<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    public $table = 'servicios_aeropuertos';

    protected $fillable = [
        'aeropuerto_id',
        'nombre',
        'imagen',
        'descripcion',
    ];

    protected $hidden = [
        'ca_idUsuario',
        'ca_tipo',
        'ca_estado',
        'created_at',
        'updated_at',
    ];
}
