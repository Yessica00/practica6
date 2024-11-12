@extends('plantillas/plantilla2')

{{-- CONTENIDO1 --}}
@section('contenido1')
    @include('Personal/tablahtml')
@endsection

<style>
  .section-container {
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 5px;
    background-color: #7878781a;
    margin-bottom: 20px;
  }

  .form-title {
    color: #333;
    font-weight: bold;
    font-size: 18px;
    margin-bottom: 15px;
  }

  .row-custom {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
  }

  .column-custom {
    flex: 1 1 45%;
  }

  .column-full {
    flex: 1 1 100%;
  }

  .form-group {
    margin-bottom: 10px;
  }

  .btn-custom {
    background-color: grey;
    color: white;
    border: none;
  }

  .btn-custom:hover {
    background-color: blue;
  }
</style>

{{-- CONTENIDO2 --}}
@section('contenido2')

@foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
@endforeach

@if ($accion == 'C')
  <h1>INSERTANDO</h1> 
  <form action="{{ route('Personal.store') }}" method="POST">
@elseif ($accion == 'E')
  <h1>EDITANDO PERSONAL</h1> 
  <form action="{{ route('Personal.update', $personal->idPersonal) }}" method="POST">
@elseif ($accion == 'D')
  <h1>PARA ELIMINAR</h1> 
  <form action="{{ route('Personal.destroy', $personal) }}" method="POST">
@endif

  @csrf

  <!-- Información Personal -->
  <div class="section-container">
    <h5 class="form-title">Información Personal</h5>
    <div class="row-custom">
      <div class="column-custom">
        <label for="RFC" class="col-form-label">RFC</label>
        <input type="text" class="form-control" id="RFC" name="RFC" value="{{ old('RFC', $personal->RFC ) }}" required {{ $des }}>
      </div>

      <div class="column-custom">
        <label for="nombre" class="col-form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $personal->nombre ) }}" required {{ $des }}>
      </div>

      <div class="column-custom">
        <label for="apellidoP" class="col-form-label">Apellido Paterno</label>
        <input type="text" class="form-control" id="apellidoP" name="apellidoP" value="{{ old('apellidoP', $personal->apellidoP ) }}" {{ $des }}>
      </div>

      <div class="column-custom">
        <label for="apellidoM" class="col-form-label">Apellido Materno</label>
        <input type="text" class="form-control" id="apellidoM" name="apellidoM" value="{{ old('apellidoM', $personal->apellidoM ) }}" required {{ $des }}>
      </div>
    </div>
  </div>

  <!-- Formación Académica -->
  <div class="section-container">
    <h5 class="form-title">Formación Académica</h5>
    <div class="row-custom">
      <div class="column-custom">
        <label for="licenciatura" class="col-form-label">Licenciatura</label>
        <input type="text" class="form-control" id="licenciatura" name="licenciatura" value="{{ old('licenciatura', $personal->licenciatura ) }}" {{ $des }}>
        <label for="lictit" class="col-form-label">Titulado</label>
        <div>
          <input type="radio" id="lictit_yes" name="lictit" value="1" {{ old('lictit', $personal->lictit ?? '') == '1' ? 'checked' : '' }}> Sí
          <input type="radio" id="lictit_no" name="lictit" value="0" {{ old('lictit', $personal->lictit ?? '') == '0' ? 'checked' : '' }} {{ $des }}> No
        </div>
      </div>

      <div class="column-custom">
        <label for="especializacion" class="col-form-label">Especialización</label>
        <input type="text" class="form-control" id="especializacion" name="especializacion" value="{{ old('especializacion', $personal->especializacion ) }}" {{ $des }}>
        <label for="esptit" class="col-form-label">Titulado</label>
        <div>
          <input type="radio" id="esptit_yes" name="esptit" value="1" {{ old('esptit', $personal->esptit ?? '') == '1' ? 'checked' : '' }} {{ $des }}> Sí
          <input type="radio" id="esptit_no" name="esptit" value="0" {{ old('esptit', $personal->esptit ?? '') == '0' ? 'checked' : '' }} {{ $des }}> No
        </div>
      </div>

      <div class="column-custom">
        <label for="maestria" class="col-form-label">Maestría</label>
        <input type="text" class="form-control" id="maestria" name="maestria" value="{{ old('maestria', $personal->maestria ) }}" {{ $des }}>
        <label for="maetit" class="col-form-label">Titulado</label>
        <div>
          <input type="radio" id="maetit_yes" name="maetit" value="1" {{ old('maetit', $personal->maetit ?? '') == '1' ? 'checked' : '' }} {{ $des }}> Sí
          <input type="radio" id="maetit_no" name="maetit" value="0" {{ old('maetit', $personal->maetit ?? '') == '0' ? 'checked' : '' }} {{ $des }}> No
        </div>
      </div>

      <div class="column-custom">
        <label for="doctorado" class="col-form-label">Doctorado</label>
        <input type="text" class="form-control" id="doctorado" name="doctorado" value="{{ old('doctorado', $personal->doctorado ) }}" {{ $des }}>
        <label for="doctit" class="col-form-label">Titulado</label>
        <div>
          <input type="radio" id="doctit_yes" name="doctit" value="1" {{ old('doctit', $personal->doctit ?? '') == '1' ? 'checked' : '' }} {{ $des }}> Sí
          <input type="radio" id="doctit_no" name="doctit" value="0" {{ old('doctit', $personal->doctit ?? '') == '0' ? 'checked' : '' }} {{ $des }}> No
        </div>
      </div>
    </div>
  </div>

  <!-- Fechas de Ingreso -->
  <div class="section-container">
    <h5 class="form-title">Fechas de Ingreso</h5>
    <div class="row-custom">
      <div class="column-custom">
        <label for="fechaIngSep" class="col-form-label">Fecha Ingreso SEP</label>
        <input type="date" class="form-control" id="fechaIngSep" name="fechaIngSep" value="{{ old('fechaIngSep', $personal->fechaIngSep ) }}" {{ $des }}>
      </div>
      
      <div class="column-custom">
        <label for="fechaIngIns" class="col-form-label">Fecha Ingreso Institución</label>
        <input type="date" class="form-control" id="fechaIngIns" name="fechaIngIns" value="{{ old('fechaIngIns', $personal->fechaIngIns ) }}" {{ $des }}>
      </div>
    </div>
  </div>

  <!-- Departamento y Puesto -->
  <div class="section-container">
    <h5 class="form-title">Departamento y Puesto</h5>
    <div class="row-custom">
      <div class="column-custom">
        <label for="idDepto" class="col-form-label">Departamento</label>
        <select class="form-control" id="idDepto" name="idDepto" required {{ $des }}>
          @foreach ($deptos as $depto)
            <option value="{{ $depto->idDepto }}" {{ $depto->idDepto == old('idDepto', $personal->idDepto ?? '') ? 'selected' : '' }}>{{ $depto->nombreDepto }}</option>
          @endforeach
        </select>
      </div>

      <div class="column-custom">
        <label for="idPuesto" class="col-form-label">Puesto</label>
        <select class="form-control" id="idPuesto" name="idPuesto" required {{ $des }}>
          @foreach($puestos as $puesto)
            <option value="{{ $puesto->idPuesto }}" {{ $puesto->idPuesto == old('idPuesto', $personal->idPuesto ?? '') ? 'selected' : '' }}>{{ $puesto->tipo }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>

  <button type="submit" class="btn btn-custom">{{ $txtbtn }}</button>
</form>
@endsection
