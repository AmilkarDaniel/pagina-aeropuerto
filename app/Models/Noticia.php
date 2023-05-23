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
        'multimedia_id',
        'user_id',
        'ca_idUsuario',
        'ca_tipo',
        'ca_estado',
    ];
}
