<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use App\Models\Materia;
use App\Models\Periodo;
use App\Models\Edificio;
use App\Models\Personal;
use App\Models\Grupo21330;
use Illuminate\Http\Request;
use App\Models\GrupoHorario21330;

class Grupo21330Controller extends Controller
{
    public $val;

    public function __construct()
    {
        $this->val = [
            'grupo'        => ['required'],
            'maxAlumnos'   => ['required'],
            'descripcion'  => ['required'],
            'idPeriodo'    => ['required', 'exists:periodos,idPeriodo'],
            'idMateria'    => ['required', 'exists:materias,idMateria'],
            'idPersonal'   => ['nullable', 'exists:personals,idPersonal'],
        ];
    }

    public function index()
    {
        $grupos21330 = Grupo21330::paginate(5);
        return view('Grupos21330.index', compact('grupos21330'));
    }

    public function create()
    {
        $grupos21330 = Grupo21330::paginate(5);
        $grupo21330 = new Grupo21330;

        $periodos = Periodo::all();
        $materias = Materia::all();
        $personals = Personal::all();

        $accion = 'C';
        $txtbtn = 'Guardar';
        $des = '';
        return view("Grupos21330.frm", compact("grupos21330", "grupo21330", "accion", "txtbtn", "des", "periodos", "materias", "personals"));
    }
    public function store(Request $request)
    {
        // Validar los datos del grupo
        $val = $request->validate($this->val);
    
        // Crear el grupo
        $nuevoGrupo = Grupo21330::create($val);
    
        // Validar los datos del horario (puedes ajustar las reglas de validación)
        $horarioData = $request->validate([
            'dia' => 'required',
            'hora' => 'required',
            'idLugar' => 'required|exists:lugares,idLugar',
        ]);
    
        // Crear el horario asociado al grupo
        GrupoHorario21330::create([
            'dia' => $horarioData['dia'],
            'hora' => $horarioData['hora'],
            'idLugar' => $horarioData['idLugar'],
            'idGrupo' => $nuevoGrupo->id, // Asociar al grupo recién creado
        ]);
    
        // Redirigir a la vista de edición del grupo
        return redirect()->route('Grupos21330.edit', ['grupo21330' => $nuevoGrupo->id]);
    }
    

    public function show(Grupo21330 $grupo21330)
    {
        $grupos21330 = Grupo21330::paginate(5);
        $accion = 'D';
        $txtbtn = 'Confirmar eliminación';
        $periodos = Periodo::all();
        $materias = Materia::all();
        $personals = Personal::all();

        $des = 'disabled';
        return view("Grupos21330.frm", compact('grupos21330', 'grupo21330', 'accion', 'txtbtn', 'des', 'periodos', 'materias', 'personals'));
    }

    public function edit(Grupo21330 $grupo21330)
    {
        $grupos21330 = Grupo21330::paginate(5);
        $accion = 'E';
        $txtbtn = 'Actualizar';
        $periodos = Periodo::all();
        $materias = Materia::all();
        $personals = Personal::all();
        $horarios = GrupoHorario21330::all(); // Todos los horarios disponibles
        $grupoHorario21330 = new GrupoHorario21330; // Crear un objeto vacío para el formulario
        $grupos = Grupo21330::all(); // Obtener todos los grupos
        $edificios = Edificio::all(); // Obtener edificios disponibles
        $lugares = Lugar::all(); // Obtener lugares disponibles
    
        $des = ''; // Campos habilitados
    
        return view("Grupos21330.frm", compact(
            "horarios", 
            "lugares", 
            "grupoHorario21330", 
            "grupos", 
            "edificios", 
            'txtbtn', 
            'des', 
            "accion",
            'grupos21330', 'grupo21330', 'accion', 'txtbtn', 'des', 'periodos', 'materias', 'personals'
        ));
    }

    public function update(Request $request, Grupo21330 $grupo21330)
{
    // Validar los datos del grupo
    $val = $request->validate($this->val);
    $grupo21330->update($val);

    // Validar los datos del horario
    $horarioData = $request->validate([
        'dia' => 'required',
        'hora' => 'required',
        'idLugar' => 'required|exists:lugares,idLugar',
    ]);

    // Actualizar el horario asociado al grupo
    $grupoHorario21330 = GrupoHorario21330::where('idGrupo', $grupo21330->id)->first();
    if ($grupoHorario21330) {
        $grupoHorario21330->update([
            'dia' => $horarioData['dia'],
            'hora' => $horarioData['hora'],
            'idLugar' => $horarioData['idLugar'],
        ]);
    }

    // Redirigir a la vista de edición del grupo
    return redirect()->route('Grupos21330.edit', ['grupo21330' => $grupo21330->id]);
}


    public function destroy(Grupo21330 $grupo21330)
    {
        $grupo21330->delete();
        return redirect()->route('Grupos21330.index');
    }
}
