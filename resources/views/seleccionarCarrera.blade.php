@extends('plantillas.plantilla3')

@section('title', 'Selecciona tu Carrera y Semestre')

@section('content')
    <h1>Selecciona tu carrera y semestre</h1>

    @php
        $carreras = [
            ['id' => 1, 'nombre' => 'Ingeniería en Sistemas'],
            ['id' => 2, 'nombre' => 'Administración de Empresas'],
            ['id' => 3, 'nombre' => 'Contaduría Pública']
        ];
    @endphp

    <form action="{{ url('seleccionar-grupo') }}" method="GET">
        <input type="hidden" name="turno" value="{{ request('turno') }}">

        <!-- Campo para número de control -->
        <div class="form-group">
            <label for="numero_control" class="form-label">Número de Control</label>
            <input type="text" name="numero_control" id="numero_control" class="form-control" 
                   placeholder="Ingresa tu número de control" required>
        </div>

        <div class="form-group">
            <label for="carrera" class="form-label">Carrera</label>
            <select name="carrera" id="carrera" class="form-control">
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera['id'] }}">{{ $carrera['nombre'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="semestre" class="form-label">Semestre</label>
            <select name="semestre" id="semestre" class="form-control">
                @for($i = 1; $i <= 8; $i++)
                    <option value="{{ $i }}">Semestre {{ $i }}</option>
                @endfor
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Siguiente</button>
    </form>
@endsection
