<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grupo21330 extends Model
{
    use HasFactory;


    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 
        'grupo',
        'fecha',
        'maxAlumnos', 
        'descripcion',
        'idPeriodo',
        'idMateria',
        'idPersonal',
        
    ];
    public function periodo():BelongsTo{
        return $this->belongsTo(Periodo::class,'idPeriodo');
    }
    public function materia():BelongsTo{
        return $this->belongsTo(Materia::class,'idMateria');
    }
    public function personal():BelongsTo{
        return $this->belongsTo(Personal::class,'idPersonal');
    }

}
