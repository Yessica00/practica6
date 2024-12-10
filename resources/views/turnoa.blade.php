@extends('plantillas.plantilla3')
@section('title', 'Selecciona tu Turno')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            padding: 20px;
        }

        .content {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .table thead th {
            background-color: #007bff;
            color: white;
        }

        .btn:disabled {
            background-color: #cccccc;
            border-color: #cccccc;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1 class="text-center mb-4">Verificación de Alumno</h1>
    
        <!-- Información del Alumno -->
        <div>
            <h4>Información del Alumno</h4>
            <p><strong>Número de Control:</strong> {{ $datosAlumno['numero_control'] }}</p>
            <p><strong>Nombre:</strong> {{ $datosAlumno['nombre'] }}</p>
        </div>
    
        <!-- Formulario de verificación -->
        <form method="get" action="/turno">
            @csrf
    
            <!-- Tabla de pagos -->
            <div class="mt-4">
                <h5>Estado de Pagos</h5>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Concepto</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pago Realizado</td>
                            <td>
                                {{ $datosAlumno['pagoRealizado'] ? 'Sí' : 'No' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    
            <!-- Tabla de documentación -->
            <div class="mt-4">
                <h5>Estado de Documentación</h5>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Documentación Completa</td>
                            <td>
                                {{ $datosAlumno['documentosCompletos'] ? 'Sí' : 'No' }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
    
            <!-- Botón para continuar -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary w-100" 
                    formaction="{{ route('seleccionarCarrera') }}" 
                    @if(!$datosAlumno['documentosCompletos'] || !$datosAlumno['pagoRealizado']) disabled @endif>
                    Continuar a Turnos
                </button>
            </div>
        </form>
    </div>
    @endsection