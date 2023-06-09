<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Noticia>
 */
class NoticiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo'=>$this->faker->text(15),
            'detalle'=>$this->faker->text(85),
            'prioridad'=>$this->faker->randomElement([1, 2, 3]),
            'vigenciaI'=>$this->faker->date(),
            'vigenciaF'=>$this->faker->date(),
            'user_id' => $this->faker->numberBetween(1, 2),
            'ca_idUsuario' => 1,
            'ca_tipo' => 'create',
            'ca_estado' => 1,
        ];
    }
}
