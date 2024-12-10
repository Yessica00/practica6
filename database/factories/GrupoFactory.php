<?php

namespace Database\Factories;

use App\Models\Hora;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Personal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grupo>
 */
class GrupoFactory extends Factory
{
   /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Hora::class;

    
    public function definition(): array
    {
      return [
          //
      ];
  }
}
