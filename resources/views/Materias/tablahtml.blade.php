<ul></ul>

@isset($mensaje)
    <p>{{ $mensaje }}</p>
@endisset

<h1 class="text-center mt-4" style="font-family: 'Times New Roman', Times, serif; color: #0a0a0a;">Materia</h1>



<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered" style="border-radius: 8px; overflow: hidden;">
        <thead class="table-dark">
            <tr>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Nombre Materia</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Nombre Mediano</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Nombre Corto</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Nivel</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Modalidad</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Semestre</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Retícula</th>
                <th></th>
                <th></th>
                <th></th>
            <th><a href="{{ route('Materias.create') }}" class="btn btn-dark mb-3" role="button">
                <i class="fas fa-plus"></i> +
            </a></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materias as $materia)
                <tr>
                    <td>{{ $materia->nombreMateria }}</td>
                    <td>{{ $materia->nombreMediano }}</td>
                    <td>{{ $materia->nombreCorto }}</td>
                    <td>{{ $materia->nivel }}</td>
                    <td>{{ $materia->modalidad }}</td>
                    <td>{{ $materia->semestre }}</td>
                    <td>{{ $materia->reticula->descripcion }}</td>
                    <td>
                        <a href="{{ route('Materias.edit', $materia->idMateria) }}" class="btn btn-sm btn-edit">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('Materias.show', $materia->idMateria) }}" class="btn btn-sm btn-delete">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('Materias.show', $materia->idMateria) }}" class="btn btn-sm btn-view">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                    </td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $materias->links('pagination::bootstrap-4') }}
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
