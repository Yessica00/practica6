<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use Illuminate\Http\Request;
use App\Models\MateriasAbierta;

class MateriasAbiertaController extends Controller
{
    public $idCarrera;
    public $idPeriodo;

    public function __construct()
    {
        // Obtener los valores de filtro de la request o de la sesión
        $this->idCarrera = request()->idcarrera ?? session('idCarrera', -1);
        $this->idPeriodo = request()->idperiodo ?? session('idPeriodo', -1);

        // Actualizar la sesión
        session(['idCarrera' => $this->idCarrera, 'idPeriodo' => $this->idPeriodo]);
    }

    public function index()
    {
        // Obtener las carreras y períodos para los select
        $carreras = Carrera::all();
        $periodos = Periodo::all();

        // Cargar las materias de la carrera seleccionada
        $materiasPorSemestre = collect(); // Colección vacía por defecto
        if ($this->idCarrera != -1) {
            $materiasPorSemestre = Materia::whereHas('reticula', function ($query) {
                $query->where('idCarrera', $this->idCarrera);
            })->get()->groupBy('semestre');
        }

        return view('MateriasA.index', [
            'carreras' => $carreras,
            'periodos' => $periodos,
            'materiasPorSemestre' => $materiasPorSemestre,
            'idCarrera' => $this->idCarrera,
            'idPeriodo' => $this->idPeriodo,
        ]);
    }

    public function store(Request $request)
    {
        // Procesar las materias seleccionadas
        foreach ($request->except('_token', 'idPeriodo', 'idCarrera', 'eliminar') as $materiaKey => $materiaId) {
            MateriasAbierta::updateOrCreate([
                'idPeriodo' => $this->idPeriodo,
                'idCarrera' => $this->idCarrera,
                'idMateria' => $materiaId,
            ]);
        }

        // Eliminar materias si se solicita
        if ($request->eliminar && $request->eliminar != 'NOELIMINAR') {
            MateriasAbierta::where([
                'idPeriodo' => $this->idPeriodo,
                'idCarrera' => $this->idCarrera,
                'idMateria' => $request->eliminar,
            ])->delete();
        }

        return redirect()->route('MateriasA.index');
    }
}
