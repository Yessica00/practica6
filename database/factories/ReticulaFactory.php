<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reticula>
 */
class ReticulaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    
        return [
            
            "idReticula"=>fake()->bothify("????"),
            'descripcion' => fake()->sentence(20), // Genera una frase de 6 palabras.
            'fechaEnVigor' => fake()->date('Y-m-d'),
        ];
    }
}
