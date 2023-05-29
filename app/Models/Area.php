<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $table = 'areas';
    
    protected $fillable = [
        'nombre',
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
