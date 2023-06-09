<?php

namespace Database\Seeders;

use App\Models\Aeropuerto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AeropuertoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aeropuerto1 = new Aeropuerto();
        $aeropuerto1->nombre = 'Aeropuerto Internacional de Viru Viru';
        $aeropuerto1->ca_idUsuario = 1;
        $aeropuerto1->ca_tipo = 'create';
        $aeropuerto1->ca_estado = 1;
        $aeropuerto1->save();

        $aeropuerto2 = new Aeropuerto();
        $aeropuerto2->nombre = 'Aeropuerto Internacional El Alto';
        $aeropuerto2->ca_idUsuario = 1;
        $aeropuerto2->ca_tipo = 'create';
        $aeropuerto2->ca_estado = 1;
        $aeropuerto2->save();
        
        $aeropuerto3 = new Aeropuerto();
        $aeropuerto3->nombre = 'Aeropuerto Internacional Jorge Wilstermann';
        $aeropuerto3->ca_idUsuario = 1;
        $aeropuerto3->ca_tipo = 'create';
        $aeropuerto3->ca_estado = 1;
        $aeropuerto3->save();

        $aeropuerto4 = new Aeropuerto();
        $aeropuerto4->nombre = 'Aeropuerto Capitán Oriel Lea Plaza';
        $aeropuerto4->ca_idUsuario = 1;
        $aeropuerto4->ca_tipo = 'create';
        $aeropuerto4->ca_estado = 1;
        $aeropuerto4->save();

        $aeropuerto5 = new Aeropuerto();
        $aeropuerto5->nombre = 'Aeropuerto de Yacuiba';
        $aeropuerto5->ca_idUsuario = 1;
        $aeropuerto5->ca_tipo = 'create';
        $aeropuerto5->ca_estado = 1;
        $aeropuerto5->save();

        $aeropuerto6 = new Aeropuerto();
        $aeropuerto6->nombre = 'Aeropuerto Internacional de Alcantarí';
        $aeropuerto6->ca_idUsuario = 1;
        $aeropuerto6->ca_tipo = 'create';
        $aeropuerto6->ca_estado = 1;
        $aeropuerto6->save();

        $aeropuerto7 = new Aeropuerto();
        $aeropuerto7->nombre = 'Aeropuerto Capitán Nicolás Rojas';
        $aeropuerto7->ca_idUsuario = 1;
        $aeropuerto7->ca_tipo = 'create';
        $aeropuerto7->ca_estado = 1;
        $aeropuerto7->save();

        $aeropuerto8 = new Aeropuerto();
        $aeropuerto8->nombre = 'Aeropuerto Joya Andina';
        $aeropuerto8->ca_idUsuario = 1;
        $aeropuerto8->ca_tipo = 'create';
        $aeropuerto8->ca_estado = 1;
        $aeropuerto8->save();

        $aeropuerto9 = new Aeropuerto();
        $aeropuerto9->nombre = 'Aeropuerto Juan Mendoza';
        $aeropuerto9->ca_idUsuario = 1;
        $aeropuerto9->ca_tipo = 'create';
        $aeropuerto9->ca_estado = 1;
        $aeropuerto9->save();

        $aeropuerto10 = new Aeropuerto();
        $aeropuerto10->nombre = 'Aeropuerto Capitán Aníbal Arab';
        $aeropuerto10->ca_idUsuario = 1;
        $aeropuerto10->ca_tipo = 'create';
        $aeropuerto10->ca_estado = 1;
        $aeropuerto10->save();

        $aeropuerto11 = new Aeropuerto();
        $aeropuerto11->nombre = 'Aeropuerto de Rurrenabaque';
        $aeropuerto11->ca_idUsuario = 1;
        $aeropuerto11->ca_tipo = 'create';
        $aeropuerto11->ca_estado = 1;
        $aeropuerto11->save();

        $aeropuerto12 = new Aeropuerto();
        $aeropuerto12->nombre = 'Aeropuerto Teniente Jorge Henrich Arauz';
        $aeropuerto12->ca_idUsuario = 1;
        $aeropuerto12->ca_tipo = 'create';
        $aeropuerto12->ca_estado = 1;
        $aeropuerto12->save();

        $aeropuerto13 = new Aeropuerto();
        $aeropuerto13->nombre = 'Aeropuerto Ernesto Roca Barbadillo';
        $aeropuerto13->ca_idUsuario = 1;
        $aeropuerto13->ca_tipo = 'create';
        $aeropuerto13->ca_estado = 1;
        $aeropuerto13->save();

        $aeropuerto14 = new Aeropuerto();
        $aeropuerto14->nombre = 'Aeropuerto Capitán Av. Selin Zeitun López';
        $aeropuerto14->ca_idUsuario = 1;
        $aeropuerto14->ca_tipo = 'create';
        $aeropuerto14->ca_estado = 1;
        $aeropuerto14->save();
    }
}
