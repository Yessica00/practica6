<ul></ul>

@isset($mensaje)
    <p>{{ $mensaje }}</p>
@endisset

<h1 class="text-center mt-4" style="font-family: 'Times New Roman', Times, serif; color: #0a0a0a;">Alumnos</h1>



<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered" style="border-radius: 8px; overflow: hidden;">
        <thead class="table-dark">
            <tr>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">No Ctrl</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Nombre</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Apellido Paterno</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Apellido Materno</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Sexo</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Carrera</th>
                <th></th>
                <th></th>
                <th></th>
            <th><a href="{{route('Alumnos2.create')}}" class="btn btn-dark mb-3" role="button">
                <i class="fas fa-plus"></i> +
            </a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->noctrl }}</td>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->apellidoP }}</td>
                <td>{{ $alumno->apellidoM }}</td>
                <td>{{ $alumno->sexo }}</td>
                <td>{{ $alumno->carrera->nombreCarrera ?? 'N/A' }}</td>
                <td>
                    <a href="{{route('Alumnos2.edit', $alumno->noctrl)}}" class="btn btn-sm btn-edit">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                </td>
                <td>
                    <a href="{{route('Alumnos2.show', $alumno->noctrl)}}" class="btn btn-sm btn-delete">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </a>
                </td>
                <td>
                    <a href="{{route('Alumnos2.show', $alumno->noctrl)}}" class="btn btn-sm btn-view">
                        <i class="fas fa-eye"></i> Ver
                    </a>
                </td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $alumnos->links('pagination::bootstrap-4') }}
    </div>
</div>

<style>
    h1.text-center {
        font-size: 2.2rem;
        font-weight: bold;
        color: #ffffff;
        text-shadow: none;
        font-family: 'Times New Roman', Times, serif;
    }

    .table {
        border-radius: 8px;
        margin-top: 30px;
    }

    .table-dark {
        background-color: #343a40;
    }

    thead th {
        color: #ffffff;
        font-family: 'Times New Roman', Times, serif;
    }

    tbody tr:hover {
        background-color: #555555;
        color: #ffffff;
    }

    .btn-sm {
        padding: 6px 12px;
        font-size: 0.9rem;
        border-radius: 5px;
        transition: background-color 0.3s;
        border: none;
    }

    .btn-edit {
        background-color: #6c757d;
        color: #ffffff;
    }

    .btn-edit:hover {
        background-color: #007bff;
    }

    .btn-delete {
        background-color: #6c757d;
        color: #ffffff;
    }

    .btn-delete:hover {
        background-color: #007bff;
    }

    .btn-view {
        background-color: #6c757d;
        color: #ffffff;
    }

    .btn-view:hover {
        background-color: #007bff;
    }

    .btn-dark {
        background-color: #444;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        transition: background-color 0.3s;
    }

    .btn-dark:hover {
        background-color: #555;
    }
</style>
