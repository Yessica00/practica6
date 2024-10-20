<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idPeriodo' => fake()->bothify("?????"),
            'periodo' => fake()->randomElement(['Ene-Jun 24','Ago-Dic 24','Ene-Jun 25']),
            'descCorta' => fake()->sentence(10), // Genera una frase de 6 palabras.
            'fechaIni' => fake()->date('Y-m-d'),
            'fechaFin' =>fake()->date('Y-m-d'),

        ];
    }
}

