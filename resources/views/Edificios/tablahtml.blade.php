<ul></ul>

@isset($mensaje)
    <p>{{ $mensaje }}</p>
@endisset

<h1 class="text-center mt-4" style="font-family: 'Times New Roman', Times, serif; color: #0a0a0a;">Edificios</h1>

<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered" style="border-radius: 8px; overflow: hidden;">
        <thead class="table-dark">
            <tr>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Id</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Nombre Edificio</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Nombre Corto</th>
                <th></th>
                <th></th>
                <th></th>
                <th>
                    <a href="{{route('Edificios.create')}}" class="btn btn-dark mb-3" role="button">
                        <i class="fas fa-plus"></i> +
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($edificios as $edificio)
            <tr>
                <td>{{ $edificio->idEdificio }}</td>
                <td>{{ $edificio->nombreEdificio }}</td>
                <td>{{ $edificio->nombreCorto }}</td>
                <td>
                    <a href="{{ route('Edificios.edit', $edificio->idEdificio) }}" class="btn btn-sm btn-edit">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                </td>
                <td>
                    <a href="{{ route('Edificios.show', $edificio->idEdificio) }}" class="btn btn-sm btn-delete">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </a>
                </td>
                <td>
                    <a href="{{ route('Edificios.show', $edificio->idEdificio) }}" class="btn btn-sm btn-view">
                        <i class="fas fa-eye"></i> Ver
                    </a>
                </td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $edificios->links('pagination::bootstrap-4') }}
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
