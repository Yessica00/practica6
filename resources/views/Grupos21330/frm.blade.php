@extends('plantillas/plantilla2')

@section('contenido1')
    @include('Grupos21330/tablahtml')
@endsection

@section('contenido2')

@foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
@endforeach

@if ($accion == 'C')
<h1>INSERTANDO GRUPO</h1> 
<form action="{{ route('Grupos21330.store') }}" method="POST">

@elseif ($accion == 'E')
<h1>EDITANDO GRUPO</h1> 
<form action="{{ route('Grupos21330.update', $grupo21330->id) }}" method="POST">

@elseif ($accion == 'D')
<h1>PARA ELIMINAR GRUPO</h1> 
<form action="{{ route('Grupos21330.destroy', $grupo21330) }}" method="POST">
@endif

@csrf
@if ($accion == 'E' || $accion == 'D')
  @method($accion == 'E' ? 'POST' : 'DELETE')
@endif

<!-- Formulario de GRUPOS -->
<div class="row mb-3">
  <label for="grupo" class="col-sm-3 col-form-label">Nombre del Grupo</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" id="grupo" name="grupo" value="{{ old('grupo', $grupo21330->grupo) }}" {{ $des }}>
    @error('grupo')
    <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
  </div>
</div>

<div class="row mb-3">
  <label for="maxAlumnos" class="col-sm-3 col-form-label">Máximo de Alumnos</label>
  <div class="col-sm-9">
    <input type="number" class="form-control" id="maxAlumnos" name="maxAlumnos" value="{{ old('maxAlumnos', $grupo21330->maxAlumnos) }}" {{ $des }}>
    @error('maxAlumnos')
    <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
  </div>
</div>

<div class="row mb-3">
  <label for="descripcion" class="col-sm-3 col-form-label">Descripción</label>
  <div class="col-sm-9">
    <textarea class="form-control" id="descripcion" name="descripcion" {{ $des }}>{{ old('descripcion', $grupo21330->descripcion) }}</textarea>
    @error('descripcion')
    <p class="text-danger">Error en: {{ $message }}</p>
    @enderror
  </div>
</div>

<div class="row mb-3">
    <label for="idPeriodo" class="col-sm-3 col-form-label">Periodo</label>
    <div class="col-sm-9">
      <select name="idPeriodo" id="idPeriodo" class="form-control" {{ $des }}>
        @foreach ($periodos as $periodo)
          <option value="{{ $periodo->idPeriodo }}" {{ $periodo->idPeriodo == old('idPeriodo', $grupos21330->idPeriodo ?? '') ? 'selected' : '' }}>
            {{ $periodo->periodo}}
          </option>
        @endforeach
      </select>
    </div>
</div>

<div class="row mb-3">
    <label for="idMateria" class="col-sm-3 col-form-label">Materia</label>
    <div class="col-sm-9">
      <select name="idMateria" id="idMateria" class="form-control" {{ $des }}>
        @foreach ($materias as $materia)
          <option value="{{ $materia->idMateria }}" {{ $materia->idMateria == old('idMateria', $grupos21330->idMateria ?? '') ? 'selected' : '' }}>
            {{ $materia->nombreMateria }}
          </option>
        @endforeach
      </select>
    </div>
</div>

<div class="row mb-3">
    <label for="idPersonal" class="col-sm-3 col-form-label">Personal</label>
    <div class="col-sm-9">
      <select name="idPersonal" id="idPersonal" class="form-control" {{ $des }}>
        @foreach ($personals as $personal)
          <option value="{{ $personal->idPersonal }}" {{ $personal->idPersonal == old('idPersonal', $grupos21330->idPersonal ?? '') ? 'selected' : '' }}>
            {{ $personal->nombre}}
          </option>
        @endforeach
      </select>
    </div>
</div>

@include('GrupoHorario21330.frm', [
    'grupo_id' => $grupo21330->id, 
    'diaPredeterminado' => old('dia', $grupoHorario21330->dia ?? 'L'),
    'horaPredeterminada' => old('hora', $grupoHorario21330->hora ?? '07-08'),
    'lugares' => $lugar,
])

<button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>

</form>
@endsection