<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrera extends Model
{
    /** @use HasFactory<\Database\Factories\CarreraFactory> */
    use HasFactory;
    // alumnos
    public function alumnos():HasMany{
        return $this->hasMany(Alumno::class);
    } 
    //depto
    public function depto():BelongsTo{
        return $this->belongsTo(Depto::class);
    }


}
