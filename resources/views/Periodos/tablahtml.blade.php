<ul></ul>
@isset($mensaje)
    <p>{{ $mensaje }}</p>
@endisset

<h1 class="text-center mt-4" style="font-family: 'Times New Roman', Times, serif; color: #0a0a0a;">Periodos</h1>
<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered table-primary" style="border-radius: 8px; overflow: hidden;">
        <thead class="table-dark">
            <tr>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Periodo</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Descripción Corta</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Fecha de Inicio</th>
                <th scope="col" style="font-family: 'Times New Roman', Times, serif; color: #ffffff;">Fecha Final</th>
                <th></th>
                <th></th>
                <th></th>
                <th>
                    <a href="{{ route('Periodos.create') }}" class="btn btn-dark mb-3" role="button" style="background-color: #444;">
                        <i class="fas fa-plus"></i> +
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periodos as $periodo)
                <tr style="background-color: #2b2b2b; border-bottom: 1px solid #444;">
                    <td>{{ $periodo->periodo }}</td>
                    <td>{{ $periodo->descCorta }}</td>
                    <td>{{ $periodo->fechaIni ? $periodo->fechaIni->format('Y-m-d') : 'N/A' }}</td>
                    <td>{{ $periodo->fechaFin ? $periodo->fechaFin->format('Y-m-d') : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('Periodos.edit', $periodo->idPeriodo) }}" class="btn btn-sm btn-edit">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('Periodos.show', $periodo->idPeriodo) }}" class="btn btn-sm btn-delete">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('Periodos.show', $periodo->idPeriodo) }}" class="btn btn-sm btn-view">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                    </td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $periodos->links('pagination::bootstrap-4') }}
    </div>
</div>

<style>
    h1.text-center {
        font-size: 2.2rem;
        font-weight: bold;
        color: #ffffff;
        text-shadow: none;
        font-family: 'Times New Roman', Times, serif; /* Usando Times New Roman */
    }

    /* Estilos de la tabla */
    table {
        border-radius: 8px;
        margin-top: 30px;
    }

    /* Estilo para encabezados */
    .table-dark {
        background-color: #343a40;
    }

    /* Encabezados de la tabla */
    thead th {
        color: #ffffff; /* Aseguramos que el texto sea blanco */
        font-family: 'Times New Roman', Times, serif; /* Usamos Times New Roman */
    }

    /* Hover para filas */
    tbody tr:hover {
        background-color: #555555;
        color: #ffffff;
    }

    /* Botones de acción */
    .btn-sm {
        padding: 6px 12px;
        font-size: 0.9rem;
        border-radius: 5px;
        transition: background-color 0.3s;
        border: none; /* Se elimina el borde negro */
    }

    .btn-edit {
        background-color: #6c757d; /* Gris */
        color: #ffffff;
    }

    .btn-edit:hover {
        background-color: #007bff; /* Azul */
    }

    .btn-delete {
        background-color: #6c757d; /* Gris */
        color: #ffffff;
    }

    .btn-delete:hover {
        background-color: #007bff; /* Azul */
    }

    .btn-view {
        background-color: #6c757d; /* Gris */
        color: #ffffff;
    }

    .btn-view:hover {
        background-color: #007bff; /* Azul */
    }

    /* Botón de crear */
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
