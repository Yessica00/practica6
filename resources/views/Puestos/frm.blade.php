
@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido')

    @include('Puestos/tablahtml')
    
@endsection





{{-- CONTENIDO2 --}}
@section('contenido2')


@foreach ( $errors->all() as $error )
  <li>
    {{$error}}
   </li>
@endforeach
@if ($accion == 'C')
<h1>INSERTANDO</h1> 
  <form action="{{route('Puestos.store')}}" method="POST">
    

  @elseif ($accion == 'E')
  <h1>EDITANDO FRM</h1> 
  <form action="{{route('Puestos.update',$puesto->id)}}" method="POST">

    @elseif ($accion=='D')
    <h1>PARA ELIMINAR</h1> 
    <form action="{{route('Puestos.destroy',$puesto)}}" method="POST">
    
  @endif
  
  @csrf
  <div class="row mb-3">
    <label for="idPuesto" class="col-sm-3 col-form-label">Id Puesto</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="idPuesto" name="idPuesto" value="{{old('nombre',$puesto->idPuesto)}}" {{$des}}>
      @error('idPuesto')
      <p class="text-danger">Error en: {{$message}}</p>
      @enderror
    </div>
  </div>
    
    <div class="row mb-3">
      <label for="nombrePuesto" class="col-sm-3 col-form-label">Nombre</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombrePuesto" name="nombrePuesto" value="{{old('nombre',$puesto->nombrePuesto)}}" {{$des}}>
        @error('nombrePuesto')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
      </div>
    </div>

    <div class="row mb-3">
      <label for="tipo" class="col-sm-3 col-form-label">Tipo</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="tipo" name="tipo" value="{{old('tipo',$puesto->tipo)}}" {{$des}}>
        @error('tipo')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-primary">{{$txtbtn}}</button>
    
  </form>

@endsection


