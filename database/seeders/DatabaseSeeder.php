<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Noticia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database. status count donde valide si el token esta validado o no
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

        // $this->call (AreaSeeder::class);
        // $this->call (RolSeeder::class);
        // \App\Models\User::factory()->create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('123456'),
        //     'cargo' => 'desarrollador',
        //     'foto' => 'foto admin',
        //     'rol_id' => 1,
        //     'area_id' => 1,
        //     'ca_idUsuario' => 1,
        //     'ca_tipo' => 'create',
        //     'ca_estado' => true,
        // ]);
        
        // $this->call (AeropuertoSeeder::class);

        //Noticia::factory(30)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'User',
        //     'email' => 'user@gmail.com',
        //     'password' => bcrypt('123456'),
        //     'cargo' => 'desarrollador',
        //     'foto' => 'foto user',
        //     'rol_id' => 2,
        //     'area_id' => 2,
        //     'ca_idUsuario' => 1,
        //     'ca_tipo' => 'create',
        //     'ca_estado' => true,
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Mike',
        //     'email' => 'mike@gmail.com',
        //     'password' => bcrypt('123456'),
        //     'cargo' => 'desarrollador',
        //     'foto' => 'foto user 2',
        //     'rol_id' => 2,
        //     'area_id' => 2,
        //     'ca_idUsuario' => 1,
        //     'ca_tipo' => 'create',
        //     'ca_estado' => true,
        // ]);
    }
}
