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
        $nivel=array('Licenciatura','Maestria','Doctorado');
        $modalidad=array('Presencial','Virtual','Mixta');
        $titulo=fake()->unique()->jobTitle();
        return [
            
            "idMateria"=>fake()->bothify("?????"),
            'nombreMateria'=>$titulo,
            'nivel'=> fake()->randomElement($nivel),
            'nombreMediano'=>fake()->lexify(str_repeat("?",15)),
            'nombreCorto'=>substr($titulo,0,5),
            'modalidad'=> fake()->randomElement($modalidad),
        ];
    }
}
