<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database. status count donde valide si el token esta validado o no
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'cargo' => 'pasante',
            'foto' => 'foto1',
            'rol_id' => 1,
            'area_id' => 1,
            'ca_idUsuario' => 1,
            'ca_tipo' => 'admin',
            'ca_estado' => true,
        ]);
        
    }
}
