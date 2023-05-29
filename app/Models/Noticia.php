<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    public $table = 'noticias';

    protected $fillable = [
        'titulo',
        'detalle',
        'prioridad',
        'vigenciaI',
        'vigenciaF',
        'user_id',
        'ca_idUsuario',
        'ca_tipo',
        'ca_estado',
    ];

    protected $hidden = [
        'ca_idUsuario',
        'ca_tipo',
        'ca_estado',
        'created_at',
        'updated_at',
    ];
}
