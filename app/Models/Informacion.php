<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    use HasFactory;

    public $table = 'informacion_aeropuertos';

    protected $fillable = [
        'aeropuerto_id',
        'wifi',
        'peaje_auto',
        'peaje_motocicleta',
        'tarifa_parqueo',
        'articulos_prohibidos',
        'ap_armas',
        'ap_objetos_punzantes',
        'ap_art_contundentes',
        'ap_sust_quimicas',
        'ap_mat_peligroso',
        'ap_sust_explosivas',
    ];

    protected $hidden = [
        'ca_idUsuario',
        'ca_tipo',
        'ca_estado',
        'created_at',
        'updated_at',
    ];
}
