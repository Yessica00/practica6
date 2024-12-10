<table class="table table-dark table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Día</th>
            <th scope="col">Hora</th>
            <th scope="col">Lugar</th>
            <th scope="col">Grupo</th>
            <th scope="col">Acciones</th>
            <th>
                <a href="{{ route('GrupoHorario21330.create') }}" class="btn btn-dark mb-3" role="button">
                    <i class="fas fa-plus"></i> +
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($horarios as $horario)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $horario->dia }}</td>
                <td>{{ $horario->hora }}</td>
                <td>{{ $horario->lugar->nombreLugar ?? 'No asignado' }}</td>
                <td>{{ $horario->grupo->grupo ?? 'No asignado' }}</td>
                <td>
                    <a href="{{ route('GrupoHorario21330.edit', $horario->id) }}" class="btn btn-secondary">Editar</a>
                    <a href="{{ route('GrupoHorario21330.show', $horario->id) }}" class="btn btn-danger">Eliminar</a>
                </td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
  
</div>
