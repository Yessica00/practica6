<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class VerificacionController extends Controller
{
    public function verificarAlumno($noctrl) {
        // Buscar al alumno con sus relaciones de documentos y pagos
        $alumno = Alumno::with(['documentos', 'pagos'])->where('noctrl', $noctrl)->first();
    
        // Validar si el alumno existe
        if (!$alumno) {
            return redirect()->back()->with('error', 'Alumno no encontrado.');
        }
    
        // Verificar si todos los documentos están completos
        $documentosCompletos = $alumno->documentos->isNotEmpty() &&
            $alumno->documentos->every(function ($documento) {
                return $documento->curp && $documento->acta_nacimiento && $documento->titulo_preparatoria;
            });
    
        // Verificar si tiene al menos un pago registrado
        $pagoRealizado = $alumno->pagos->isNotEmpty();
    
        // Datos del alumno para pasar a la vista
        $datosAlumno = [
            'numero_control' => $alumno->noctrl,
            'nombre' => $alumno->nombre,
            'documentosCompletos' => $documentosCompletos,
            'pagoRealizado' => $pagoRealizado,
        ];
    
        // Retornar la vista con los datos
        return view('turnoa', compact('datosAlumno'));
    }
}    