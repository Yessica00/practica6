@extends('plantillas.plantilla3')

@section('title', 'Confirmación de Inscripción')

@section('content')
    <h1>¡Inscripción Exitosa!</h1>
    <p>Has sido inscrito al grupo seleccionado. ¡Bienvenido!</p>
    
    <div class="text-center">
        <a href="{{ url('turnoa') }}" class="btn btn-success btn-lg">Regresar al Inicio</a>
    </div>
@endsection
