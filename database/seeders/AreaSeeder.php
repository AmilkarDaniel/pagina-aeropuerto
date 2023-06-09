<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $area = new Area();
        $area->nombre = 'Sistemas';
        $area->ca_idUsuario = 1;
        $area->ca_tipo = 'create';
        $area->ca_estado = 1;
        $area->save();

        $area1 = new Area();
        $area1->nombre = 'Comunicación';
        $area1->ca_idUsuario = 1;
        $area1->ca_tipo = 'create';
        $area1->ca_estado = 1;
        $area1->save();

        $area2 = new Area();
        $area2->nombre = 'Legal';
        $area2->ca_idUsuario = 1;
        $area2->ca_tipo = 'create';
        $area2->ca_estado = 1;
        $area2->save();
    }
}
