<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\MateriasAbierta;
use Illuminate\Http\Request;

class MateriasAbiertaController extends Controller
{
    protected $idCarrera;
    protected $idPeriodo;

    public function __construct()
    {
        // Obtener valores de filtros de la request o sesión
        $this->idCarrera = request('idCarrera', session('idCarrera', -1));
        $this->idPeriodo = request('idPeriodo', session('idPeriodo', -1));

        // Actualizar los valores en sesión
        session(['idCarrera' => $this->idCarrera, 'idPeriodo' => $this->idPeriodo]);
    }

    public function index()
    {
        // Obtener carreras y periodos para los filtros
        $carreras = Carrera::all();
        $periodos = Periodo::all();

        // Obtener materias agrupadas por semestre según la carrera seleccionada
        $materiasPorSemestre = collect();
        if ($this->idCarrera != -1) {
            $materiasPorSemestre = Materia::whereHas('reticula', function ($query) {
                $query->where('idCarrera', $this->idCarrera);
            })->get()->groupBy('semestre');
        }

        // Materias ya abiertas para la combinación actual de carrera y periodo
        $materiasAbiertas = MateriasAbierta::where('idCarrera', $this->idCarrera)
            ->where('idPeriodo', $this->idPeriodo)
            ->pluck('idMateria')
            ->toArray();

            return view('MateriasA.index', [
                'carreras' => $carreras,
                'periodos' => $periodos,
                'materiasPorSemestre' => $materiasPorSemestre,
                'materiasAbiertas' => $materiasAbiertas,
                'idCarrera' => $this->idCarrera, // Aseguramos que esta variable exista
                'idPeriodo' => $this->idPeriodo, // Aseguramos que esta variable exista
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

        // Eliminar materias si se seleccionó la opción
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
