<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public $val;

    public function __construct(){
        $this->val=[
            'noctrl'    =>['required','min:8'],
            'nombre'    =>['required','min:3'],
            'apellidoP' =>['required'],
            'apellidoM' =>['required'],
            'sexo'      =>['required'],

        ];
    }

    public function index()
    {
        $alumnos= Alumno::paginate(5);
        return view("Alumnos2/index",compact("alumnos"));
    }

    public function create()
    {
        $alumnos= Alumno::paginate(5); 
        $alumno=new Alumno;
        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Alumnos2/frm",compact("alumnos",'alumno',"accion",'txtbtn','des'));
    }

   
    public function store(Request $request)
    {
        
       $val= $request->validate($this->val);
        Alumno::create($val);
        return redirect()->route('Alumnos.index')->with("mensaje",'se inserto correctamente.');
    }

 
    public function show(Alumno $alumno)
    {
        $alumnos=Alumno::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $des='disabled';
        return view("Alumnos2.frm",compact('alumnos','alumno','accion','txtbtn','des'));
    }

  
    public function edit(Alumno $alumno)
    {   
        
        $alumnos=Alumno::Paginate(5);
        $accion='E';
        $txtbtn='actualizar';
        $des='';
        return view("Alumnos2.frm",compact('alumnos','alumno','accion','txtbtn','des'));
    }

  
    public function update(Request $request, Alumno $alumno)
    {   
        //LO QUE SE DA VALIDADO SE GRABA
        $val= $request->validate($this->val);
        $alumno->update($val);
        return redirect()->route('Alumnos.index');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
{
    $alumno->delete();
    return redirect()->route('Alumnos.index');
}

    
}
