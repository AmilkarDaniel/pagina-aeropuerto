<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    public $table = 'roles';
    
    protected $fillable = [
        'tipo',
        'ca_idUsuario',
        'ca_tipo',
        'ca_estado',
    ];
}
