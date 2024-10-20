<?php

namespace Database\Seeders;

use App\Models\Depto;
use App\Models\Alumno;
use App\Models\Carrera;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        Depto::factory(3)->has(
            Carrera::factory(5)->has(
                Alumno::factory(3)
            )
        )->create();
    }
}
