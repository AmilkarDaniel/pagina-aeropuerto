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
        $area1->nombre = 'Comunicacion';
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

        $area3 = new Area();
        $area3->nombre = 'Recursos';
        $area3->ca_idUsuario = 1;
        $area3->ca_tipo = 'create';
        $area3->ca_estado = 1;
        $area3->save();

        $area4 = new Area();
        $area4->nombre = 'Transparencia';
        $area4->ca_idUsuario = 1;
        $area4->ca_tipo = 'create';
        $area4->ca_estado = 1;
        $area4->save();

        $area5 = new Area();
        $area5->nombre = 'Aeronautica';
        $area5->ca_idUsuario = 1;
        $area5->ca_tipo = 'create';
        $area5->ca_estado = 1;
        $area5->save();
    }
}
