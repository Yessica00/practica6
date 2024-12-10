<?php
 
namespace App\Http\Controllers;

use App\Models\Depto;
use App\Models\Grupo;
use App\Models\Lugar;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Edificio;
use App\Models\Personal;
use App\Models\GrupoHorario;
use Illuminate\Http\Request;
use App\Models\MateriaAbierta;
use App\Models\MateriasAbierta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
 
class JsonController extends Controller
{
    //
    public function periodos(){
        $periodos = Periodo::get();
        return $periodos;
    }
 
 
    public function carreras(){
        $carreras = Carrera::get();
        return $carreras;
    }

    public function semestres(){
        $semestres = Materia::get();
        $semestres =DB::table('materias')
        ->select('semestre')
        ->groupby('semestre')
        ->orderby('semestre')
        ->get();
        return $semestres;
    }

    public function materiasa($semestre)
    {
        $materiasa = MateriasAbierta::with('materia.reticula.carrera')
            ->whereHas('materia', function ($query) use ($semestre) { // Aquí usamos "use" para pasar $semestre
                $query->where('semestre', $semestre);
            })
            ->get();
    
        return $materiasa;
    }
    
    

    public function deptos(){
        $deptos = Depto::get();
        return $deptos;
    }
    public function edificios(){
        $edificios = Edificio::get();
        return $edificios;
    }
    
    public function alumnos()
{
  
    $alumnos = Alumno::select('nombre', 'apellidoP', 'sexo')->get();
    
    
    return $alumnos;
}
public function lugar() {
    $lugar = Lugar::get();
    return $lugar;
}
public function personal() {
    $personal = Personal::get();
    return $personal;
}
public function materias()
{
    $materias = MateriasAbierta::with(['materia:id,nombremateria'])
    ->get(['id', 'materia_id', 'periodo_id', 'carrera_id'])
    ->unique('materia.nombremateria');
    return $materias;
}

public function insertarGrupo(Request $request)
    {
        try {
            Log::info('Datos recibidos:', $request->all());
    
            $validatedData = $request->validate([
                'grupo' => 'required|string|max:5',
                'descripcion' => 'required|string|max:200',
                'maxalumnos' => 'required|integer|min:1',
                'fecha' => 'required|date',
                'periodo_id' => 'required|integer',
                'materia_abierta_id' => 'required|exists:materia_abiertas,id',
                'personal_id' => 'nullable|exists:personals,id',
            ]);
    
            // Verificar si el grupo existe para actualizarlo
            $grupo = Grupo::where('grupo', $validatedData['grupo'])->first();
    
            if ($grupo) {
                // Si el grupo existe, actualízalo
                $grupo->update($validatedData);
            } else {
                // Si el grupo no existe, créalo
                $grupo = Grupo::create($validatedData);
            }
    
            return response()->json([
                'success' => true,
                'message' => $grupo->exists ? 'Grupo actualizado exitosamente' : 'Grupo creado exitosamente',
                'grupo' => $grupo,
            ], 200);
    
        } catch (\Exception $e) {
            Log::error('Error al insertar o actualizar el grupo:', ['message' => $e->getMessage()]);
    
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }    
    
    /* Insertar Grupo Horario*/
    public function insertarGrupoHorario(Request $request)
    {
        $validated = $request->validate([
            'grupo_id' => 'required|exists:grupos,id',
            'lugar_id' => 'required|exists:lugars,id',
            'dia' => 'required|string|max:15',
            'hora' => 'required|string|max:10',
        ]);

        try {
            // Validación adicional para prevenir duplicados
            $exists = GrupoHorario::where('grupo_id', $validated['grupo_id'])
                ->where('dia', $validated['dia'])
                ->where('hora', $validated['hora'])
                ->where('lugar_id', $validated['lugar_id'])
                ->exists();

            if ($exists) {
                return response()->json([
                    'message' => 'El horario ya existe para este grupo en este lugar, día y hora.',
                ], 422);
            }

            $grupoHorario = GrupoHorario::create([
                'grupo_id' => $validated['grupo_id'],
                'lugar_id' => $validated['lugar_id'],
                'dia' => $validated['dia'],
                'hora' => $validated['hora'],
            ]);

            return response()->json([
                'message' => 'Horario del grupo insertado correctamente.',
                'data' => $grupoHorario,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al insertar el horario del grupo.',
                'error' => $e->getMessage(),
            ], 500);
        }
    } 

    /* Eliminar Grupo Horario */
    public function eliminarGrupoHorario(Request $request)
    {
        $validated = $request->validate([
            'grupo_id' => 'required|exists:grupos,id',
            'lugar_id' => 'required|exists:lugars,id',
            'dia' => 'required|string|max:15',
            'hora' => 'required|string|max:10',
        ]);

        try {
            $grupoHorario = GrupoHorario::where('grupo_id', $validated['grupo_id'])
                ->where('lugar_id', $validated['lugar_id'])
                ->where('dia', $validated['dia'])
                ->where('hora', $validated['hora'])
                ->first();

            if (!$grupoHorario) {
                return response()->json([
                    'message' => 'Horario no encontrado.',
                ], 404);
            }

            $grupoHorario->delete();

            return response()->json([
                'message' => 'Horario del grupo eliminado correctamente.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar el horario del grupo.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    }

    
 

 