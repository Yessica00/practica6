<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grupo21330s', function (Blueprint $table) {
            $table->id(); // Campo ID automático
            $table->string('grupo'); // Nombre del grupo
            $table->integer('maxAlumnos'); // Máximo de alumnos
            $table->text('descripcion')->nullable(); // Descripción del grupo
            $table->string('idPeriodo'); // Columna idPeriodo como string
            $table->string('idMateria'); // Columna idMateria como string
            $table->string('idPersonal')->nullable(); // Columna idPersonal como string
            $table->timestamps(); // Timestamps automáticos

            // Claves foráneas como string
            $table->foreign('idPeriodo')->references('idPeriodo')->on('periodos')->onDelete('cascade'); // Llave foránea a períodos
            $table->foreign('idMateria')->references('idMateria')->on('materias')->onDelete('cascade'); // Llave foránea a materias
            $table->foreign('idPersonal')->references('idPersonal')->on('personals')->onDelete('set null'); // Llave foránea a personal
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo21330s');
    }
};
