<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    /** @use HasFactory<\Database\Factories\GrupoFactory> */
    use HasFactory;


    protected $primaryKey = 'idGrupo';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idGrupo', 
        'grupo',
        'fecha',
        'maxAlumnos', 
        'descripcion',
        'idPeriodo',
        'idMateria',
        'idPersonal',
        
    ];

}
