<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Sistemas';
        $user->email = 'Sistemas';
        $user->password = bcrypt('123456');
        $user->cargo = 'sistemas';
        $user->foto = 'foto sistemas';
        $user->rol_id = 1;
        $user->area_id = 1;
        $user->ca_idUsuario = 1;
        $user->ca_tipo = 'create';
        $user->ca_estado= 1;
        $user->save();

        $user2 = new User();
        $user2->name = 'Comunicacion';
        $user2->email = 'Comunicacion';
        $user2->password = bcrypt('123456');
        $user2->cargo = 'Comunicacion';
        $user2->foto = 'foto Comunicacion';
        $user2->rol_id = 2;
        $user2->area_id = 2;
        $user2->ca_idUsuario = 1;
        $user2->ca_tipo = 'create';
        $user2->ca_estado= 1;
        $user2->save();

        $user3 = new User();
        $user3->name = 'Legal';
        $user3->email = 'Legal';
        $user3->password = bcrypt('123456');
        $user3->cargo = 'Legal';
        $user3->foto = 'foto Legal';
        $user3->rol_id = 2;
        $user3->area_id = 3;
        $user3->ca_idUsuario = 1;
        $user3->ca_tipo = 'create';
        $user3->ca_estado= 1;
        $user3->save();

        $user4 = new User();
        $user4->name = 'Recursos';
        $user4->email = 'Recursos';
        $user4->password = bcrypt('123456');
        $user4->cargo = 'Recursos';
        $user4->foto = 'foto Recursos';
        $user4->rol_id = 2;
        $user4->area_id = 4;
        $user4->ca_idUsuario = 1;
        $user4->ca_tipo = 'create';
        $user4->ca_estado= 1;
        $user4->save();

        $user5 = new User();
        $user5->name = 'Transparencia';
        $user5->email = 'Transparencia';
        $user5->password = bcrypt('123456');
        $user5->cargo = 'Transparencia';
        $user5->foto = 'foto Transparencia';
        $user5->rol_id = 2;
        $user5->area_id = 5;
        $user5->ca_idUsuario = 1;
        $user5->ca_tipo = 'create';
        $user5->ca_estado= 1;
        $user5->save();

        $user6 = new User();
        $user6->name = 'Aeronautica';
        $user6->email = 'Aeronautica';
        $user6->password = bcrypt('123456');
        $user6->cargo = 'Aeronautica';
        $user6->foto = 'foto Aeronautica';
        $user6->rol_id = 2;
        $user6->area_id = 6;
        $user6->ca_idUsuario = 1;
        $user6->ca_tipo = 'create';
        $user6->ca_estado= 1;
        $user6->save();
    }
}
