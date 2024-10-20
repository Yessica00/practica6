
@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
{{-- SI LE QUITO EL 1 SE UITA LA TABLA Y SE PONE EL INSERTAR  --}}
@section('contenido1')

    @include('Materias/tablahtml')
    
@endsection


{{-- CONTENIDO2 --}}
@section('contenido2')

@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
   {{$error}}
  </div>
@endforeach
@endif


@if ($accion == 'C')
<h1>INSERTANDO</h1> 
  <form action="{{route('Materias.store')}}" method="POST">
    

  @elseif ($accion == 'E')
  <h1>EDITANDO FRM</h1> 
  <form action="{{route('Materias.update',$materia->idMateria)}}" method="POST">

    @elseif ($accion=='D')
    <h1>PARA ELIMINAR</h1> 
    <form action="{{route('Materias.destroy',$materia)}}" method="POST">
    
  @endif
  
  @csrf 
    {{-- <div class="row mb-3">
      <label for="idCarrera" class="col-sm-3 col-form-label">Id Carrera</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="idCarrera" name="idCarrera" value="{{old('idCarrera',$carrera->idCarrera)}}" {{$des}}>
        @error('idCarrera')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
      </div>
    </div> --}}
  <div class="row mb-3">
    <label for="nombreMateria" class="col-sm-3 col-form-label">Nombre de Materia</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nombremateria" name="nombreMateria" 
               value="{{ old('nombreMateria', $materia->nombreMateria ?? '') }}" {{$des}}>
        @error('nombreMateria')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>

<!-- Campo para Nivel -->
<div class="row mb-3">
    <label for="nivel" class="col-sm-3 col-form-label">Nivel</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nivel" name="nivel" 
               value="{{ old('nivel', $materia->nivel ?? '') }}" {{$des}}>
        @error('nivel')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>

<!-- Campo para NombreMediano -->
<div class="row mb-3">
    <label for="nombreMediano" class="col-sm-3 col-form-label">Nombre Mediano</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nombreMediano" name="nombreMediano" 
               value="{{ old('nombreMediano', $materia->nombreMediano ?? '') }}" {{$des}}>
        @error('nombreMediano')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>

<!-- Campo para NombreCorto -->
<div class="row mb-3">
    <label for="nombreCorto" class="col-sm-3 col-form-label">Nombre Corto</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="nombreCorto" name="nombreCorto" 
               value="{{ old('nombreCorto', $materia->nombreCorto ?? '') }}" {{$des}}>
        @error('nombreCorto')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>

<!-- Campo para Modalidad -->
<div class="row mb-3">
    <label for="modalidad" class="col-sm-3 col-form-label">Modalidad</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="modalidad" name="modalidad" 
               value="{{ old('modalidad', $materia->modalidad ?? '') }}" {{$des}}>
        @error('modalidad')
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>


<!-- Seleccionar Retícula -->
<div class="row mb-3">
    <label for="idReticula" class="col-sm-3 col-form-label">Seleccionar Retícula</label>
    <div class="col-sm-9">
        <select name="idReticula" id="idReticula" class="form-control" {{ $des }}>
            <option value="">-- Seleccione una Retícula --</option>
            @foreach ($reticulas as $reticula)
                <option value="{{ $reticula->idReticula }}" {{ $reticula->idReticula == $materia->idReticula ? 'selected' : '' }}>
                    {{ $reticula->descripcion }}
                </option>
            @endforeach
        </select>
        @error('idReticula') 
        <p class="text-danger">Error en: {{$message}}</p>
        @enderror
    </div>
</div>


<!-- Botón de envío -->
<button type="submit" class="btn btn-primary">Grabar</button>

</form>

@endsection


