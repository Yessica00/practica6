<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoHorario extends Model
{
    /** @use HasFactory<\Database\Factories\GrupoHorarioFactory> */
    use HasFactory;

    protected $primaryKey = 'idHorarios';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idHorarios', 
        'dia',
        'hora', 
        'idLugar',
        'idGrupo',
        
        
    ];
}
