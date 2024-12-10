<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GrupoHorario21330 extends Model
{
    use HasFactory;

    // Definir la clave primaria
    protected $primaryKey = 'id';
    public $incrementing = true; // El id será incrementable
    protected $keyType = 'int'; // Tipo de clave primaria

    // Campos que pueden ser asignados en masa
    protected $fillable = [
        'id', 
        'dia',
        'hora',
        'idLugar',
        'idGrupo',
    ];

    // Relación con la tabla Lugar
    public function lugar(): BelongsTo
    {
        return $this->belongsTo(Lugar::class, 'idLugar');
    }

    // Relación con la tabla Grupo21330
    public function grupo(): BelongsTo
    {
        return $this->belongsTo(Grupo21330::class, 'idGrupo');
    }
}
