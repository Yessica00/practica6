<ul></ul>

@isset($mensaje)
    <p>{{ $mensaje }}</p>
@endisset

   <div
    class="table-responsive-md"
   >
    <table
        class="table  table-hover table-striped custom-table"
    >
        <thead class="table-dark ">
        <tr>
                <th scope="col">Grupo</th>
                <th scope="col">descripcion</th>
                <th>Maximo Alumnos</th>
                <th>fecha</th>
                <th>Periodo</th>
                <th>Materia</th>
                <th>Docente</th>
                <th><a
        name=""
        id="nuevo"
        class="btn btn-primary"
        href="{{route('Grupo.create')}}"
        role="button"
        >Abrir grupo</a
    >
   </th>
               

            </tr>
        </thead >
        <tbody class="table-group-divider">
            @foreach ($grupos as $grupo)
                <tr class="">
                    <td scope="row">{{ $grupo->grupo }}</td>
                    <td>{{ $grupo->descripcion }}</td>
                    <td>{{ $grupo->maxAlumnos }}</td>
                    <td>{{ $grupo->fecha }}</td>
                   
                    
                    <td>{{ optional($grupo->personal)->nombre ?? 'Sin Asignar' }}</td>
                    <td></td>

             
               
    
                
              
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    {{$grupos->links() }}

    <table
        class="table  table-hover table-striped custom-table"
    >
        <thead class="table-dark ">
        <tr>
            <th>Grupo</th>
                <th scope="col">Salon</th>
                <th scope="col">Dia</th>
                <th>Hora</th>
               
               

            </tr>
        </thead >
        <tbody class="table-group-divider">
            @foreach ($horarios as $grupo)
                <tr class="">
                <td scope="row">{{ $grupo->grupo}}</td>
                    <td scope="row">{{ $grupo->lugar}}</td>
                
                    <td>{{ $grupo->dia }}</td>
                    <td>{{ $grupo->hora }}</td>
                    

             
               
    
                
              
            </tr>
            @endforeach
        </tbody>
    </table> 
   </div>