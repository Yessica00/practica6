<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Depto>
 */
class DeptoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   $titulo=fake()->Unique()->jobTitle();
        return [
            'idDepto'=>fake()->unique()->bothify("?#"),
            'nombreDepto'=>$titulo,
            'nombreMediano'=>fake()->lexify(str_repeat("?",15)),
            'nombreCorto'=>substr($titulo,0,5),
        ];
    }
}
