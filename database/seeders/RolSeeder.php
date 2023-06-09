<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol = new Rol();
        $rol->tipo = 'admin';
        $rol->ca_idUsuario = 1;
        $rol->ca_tipo = 'create';
        $rol->ca_estado = 1;
        $rol->save();
    
        $rol1 = new Rol();
        $rol1->tipo = 'user';
        $rol1->ca_idUsuario = 1;
        $rol1->ca_tipo = 'create';
        $rol1->ca_estado = 1;
        $rol1->save();

        // $rol2 = new Rol();
        // $rol2->tipo = 'visitante';
        // $rol2->ca_idUsuario = 1;
        // $rol2->ca_tipo = 'create';
        // $rol2->ca_estado = 1;
        // $rol2->save();
    }
}
