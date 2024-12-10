<?php

namespace App\Http\Controllers;

use App\Models\GrupoHorario21330;
use App\Models\Grupo21330;
use App\Models\Edificio;
use App\Models\Lugar;
use Illuminate\Http\Request;

class GrupoHorario21330Controller extends Controller
{
    // Reglas de validación
    private $validationRules = [
        'dia' => ['required', 'string', 'max:255'],
        'hora' => ['required', 'date_format:H:i'],
        'idLugar' => ['required', 'exists:lugars,idLugar'],
        'idGrupo' => ['required', 'exists:grupo21330s,id'],
    ];

    // Mostrar lista de horarios con sus relaciones
    public function index()
    {
        $horarios = GrupoHorario21330::paginate(5); // Paginación para lista de horarios
        $grupos = Grupo21330::all(); // Obtener todos los grupos
        return view('GrupoHorario21330.index', compact('horarios', 'grupos'));
    }

    // Mostrar formulario para crear un nuevo horario
    public function create()
    {
        $horarios = GrupoHorario21330::all(); // Todos los horarios disponibles
        $grupoHorario21330 = new GrupoHorario21330; // Crear un objeto vacío para el formulario
        $grupos = Grupo21330::all(); // Obtener todos los grupos
        $edificios = Edificio::all(); // Obtener edificios disponibles
        $lugares = Lugar::all(); // Obtener lugares disponibles

        $accion = 'C'; // Acción: Crear
        $txtbtn = 'Guardar'; // Texto del botón
        $des = ''; // Campos habilitados

        return view("GrupoHorario21330.frm", compact(
            "horarios", 
            "lugares", 
            "grupoHorario21330", 
            "grupos", 
            "edificios", 
            'txtbtn', 
            'des', 
            "accion"
        ));
    }

    // Almacenar un nuevo horario
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->validationRules);
        GrupoHorario21330::create($validatedData);
        return redirect()->route('GrupoHorario21330.index')->with('mensaje', 'Horario creado correctamente.');
    }

    // Mostrar formulario para editar un horario existente
    public function edit($id)
    {
        $grupoHorario21330 = GrupoHorario21330::findOrFail($id); // Buscar horario a editar
        $horarios = GrupoHorario21330::all(); // Lista de horarios para referencia
        $grupos = Grupo21330::all(); // Todos los grupos
        $edificios = Edificio::all(); // Todos los edificios
        $lugares = Lugar::all(); // Todos los lugares

        $accion = 'E'; // Acción: Editar
        $txtbtn = 'Actualizar'; // Texto del botón
        $des = ''; // Campos habilitados

        return view("GrupoHorario21330.frm", compact(
            'horarios', 
            'grupoHorario21330', 
            'lugares', 
            'grupos', 
            'edificios', 
            'txtbtn', 
            'des', 
            'accion'
        ));
    }

    // Actualizar un horario existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate($this->validationRules);
        $grupoHorario21330 = GrupoHorario21330::findOrFail($id);
        $grupoHorario21330->update($validatedData);
        return redirect()->route('GrupoHorario21330.index')->with('mensaje', 'Horario actualizado correctamente.');
    }

    // Mostrar detalles para confirmar eliminación
    public function show($id)
    {
        $grupoHorario21330 = GrupoHorario21330::findOrFail($id); // Horario a mostrar
        $horarios = GrupoHorario21330::all(); // Lista de horarios
        $lugares = Lugar::all(); // Lugares disponibles
        $grupos = Grupo21330::all(); // Grupos disponibles
        $edificios = Edificio::all(); // Edificios disponibles

        $accion = 'D'; // Acción: Eliminar
        $txtbtn = 'Confirmar eliminación'; // Texto del botón
        $des = 'disabled'; // Campos deshabilitados

        return view("GrupoHorario21330.frm", compact(
            'grupoHorario21330', 
            'horarios', 
            'lugares', 
            'grupos', 
            'edificios', 
            'txtbtn', 
            'des', 
            'accion'
        ));
    }

    // Eliminar un horario
    public function destroy($id)
    {
        $grupoHorario21330 = GrupoHorario21330::findOrFail($id);
        $grupoHorario21330->delete();
        return redirect()->route('GrupoHorario21330.index')->with('mensaje', 'Horario eliminado correctamente.');
    }
}
