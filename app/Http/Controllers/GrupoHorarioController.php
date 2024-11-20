<?php

namespace App\Http\Controllers;

use App\Models\GrupoHorario;
use App\Models\Grupo;
use App\Models\Carrera;
use App\Models\Personal;
use App\Models\Lugar;
use App\Models\Periodo;
use App\Models\Materia;
use App\Models\Depto;
use App\Models\Edificio;
use Illuminate\Http\Request;

class GrupoHorarioController extends Controller
{

    public $val;
    public function __construct(){
        $this->val=[
        // 'idEdificio'=> ['required'],    
        'dia'=> ['required'],
        'hora' =>['required','max:5'],
        'idGrupo' =>['required'],
        'idLugar' =>['required'],
        
        ];
        }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $horarios=GrupoHorario::paginate(5);

       return view("/Grupos.index",compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupos = Grupo::all();
        $periodos=Periodo::all();
        $materias=Materia::all();
        $carreras=Carrera::all();
        $personales=Personal::all();
        $lugares=Lugar::all();
        $edificios=Edificio::all();
        $deptos=Depto::all();

        $accion='C';
        $txtbtn='Guardar';
        $des='';

        return view("/Grupos.form", compact("accion",'txtbtn','des', 'periodos','materias','carreras','personales',
    'lugares','deptos','edificios','grupos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate($this->val);
        $val['idHorarios'] = fake()->bothify("####");
        Grupo::create($val);
        
        return back()->with('success', 'Grupo creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GrupoHorario $grupoHorario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrupoHorario $grupoHorario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GrupoHorario $grupoHorario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrupoHorario $grupoHorario)
    {
        //
    }
}
