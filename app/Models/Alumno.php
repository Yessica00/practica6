<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumno extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoFactory> */
       use HasFactory;
    protected $fillable =['noctrl','nombre','apellidoP','apellidoM','sexo'];

    
}
