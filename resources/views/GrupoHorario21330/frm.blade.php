@extends('plantillas.plantilla2')

@section('contenido1')
    @include('GrupoHorario21330.tablahtml') <!-- Incluir tabla -->
@endsection

@section('contenido2')

@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach

@if ($accion == 'C')
<h1>INSERTANDO HORARIO DE GRUPO</h1>
<form action="{{ route('GrupoHorario21330.store') }}" method="POST">
@elseif ($accion == 'E')
<h1>EDITANDO HORARIO DE GRUPO</h1>
<form action="{{ route('GrupoHorario21330.update', $grupoHorario21330->id) }}" method="POST">
@elseif ($accion == 'D')
<h1>ELIMINANDO HORARIO DE GRUPO</h1>
<form action="{{ route('GrupoHorario21330.destroy', $grupoHorario21330) }}" method="POST">
@endif

@csrf
@if ($accion == 'E')
    @method('PUT')
@elseif ($accion == 'D')
    @method('DELETE')
@endif

<div class="row mb-3">
    <label for="dia" class="col-sm-3 col-form-label">Día de la Clase</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" id="dia" name="dia" 
               value="{{ old('dia', $grupoHorario21330->dia ?? '') }}" {{ $des }}>
        @error('dia')
            <p class="text-danger">Error: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="hora" class="col-sm-3 col-form-label">Hora de la Clase</label>
    <div class="col-sm-9">
        <input type="time" class="form-control" id="hora" name="hora" 
               value="{{ old('hora', $grupoHorario21330->hora ?? '') }}" {{ $des }}>
        @error('hora')
            <p class="text-danger">Error: {{ $message }}</p>
        @enderror
    </div>
</div>

<div class="row mb-3">
  <label for="idLugar" class="col-sm-3 col-form-label">Lugar</label>
  <div class="col-sm-9">
      <select name="idLugar" id="idLugar" class="form-control" {{ $des }}>
          @foreach ($lugares as $lugar)
              <option value="{{ $lugar->idLugar }}" 
                      {{ $lugar->idLugar == old('idLugar', $grupoHorario21330->idLugar ?? '') ? 'selected' : '' }}>
                  {{ $lugar->nombreLugar }}
              </option>
          @endforeach
      </select>
  </div>
</div>


<div class="row mb-3">
    <label for="idGrupo" class="col-sm-3 col-form-label">Grupo</label>
    <div class="col-sm-9">
        <select name="idGrupo" id="idGrupo" class="form-control" {{ $des }}>
            @foreach ($grupos as $grupo)
                <option value="{{ $grupo->id }}" 
                        {{ $grupo->id == old('idGrupo', $grupoHorario21330->idGrupo ?? '') ? 'selected' : '' }}>
                    {{ $grupo->grupo }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $txtbtn }}</button>

</form>
@endsection
