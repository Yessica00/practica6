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
        Schema::create('grupo_horario21330s', function (Blueprint $table) {
            $table->id(); // Campo ID automático
            $table->string('dia'); // Día de la clase
            $table->time('hora'); // Hora de la clase
            $table->string('idLugar',15);
            $table->unsignedBigInteger('idGrupo'); // Columna para idGrupo (foránea)
            $table->timestamps(); // Timestamps automáticos
            
            $table->foreign('idLugar')->references('idLugar')->on('lugars');
            // Claves foráneas
 // Llave foránea a lugares
            $table->foreign('idGrupo')->references('id')->on('grupo21330s')->onDelete('cascade'); // Llave foránea a grupos
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_horario21330s');
    }
};
