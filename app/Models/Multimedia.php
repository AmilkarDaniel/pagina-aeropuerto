<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    use HasFactory;

    public $table = 'contenido_multimedia';

    protected $fillable = [
        'archivo',
        'ca_idUsuario',
        'ca_tipo',
        'ca_estado',
    ];
}
