<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Estilos de navegación */
        .nav-tabs {
            display: flex;
            justify-content: space-around; /* Espacia los elementos horizontalmente */
            width: 100%; /* Hace que el menú ocupe el ancho completo */
            background-color: #ffffff;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            box-sizing: border-box;
        }

        .nav-tabs .nav-link {
            color: #333;
            font-weight: bold;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        /* Efecto hover */
        .nav-tabs .nav-link:hover {
            color: #007bff;
        }

        /* Dropdown para mostrar menú horizontal en Horarios y Proyectos Ind. */
        .dropdown:hover .dropdown-menu-horizontal {
            display: flex;
            flex-direction: row;
        }

        /* Menú de Catálogo vertical */
        .dropdown:hover .dropdown-menu-vertical {
            display: block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Color personalizado para enlaces Login y Register */
        .nav-tabs .nav-link.text-success {
            color: #28a745;
        }
        .nav-tabs .nav-link.text-danger {
            color: #dc3545;
        }

        /* Logout link estilo */
        .logout-link {
            color: #333;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        .logout-link:hover {
            color: #ff5555;
        }
    </style>
    <title>Menu</title>
</head>
<body>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="navId" role="tablist">
        <li class="nav-item">
            <a href="#tab1Id" class="nav-link active" data-bs-toggle="tab" aria-current="page">Bienvenidos</a>
        </li>

        <!-- Catálogo Dropdown (Vertical) -->
        <li class="nav-item dropdown" role="presentation">
            <a class="nav-link dropdown-toggle" href="#" id="catalogoDropdown" role="button">Catálogo</a>
            <ul class="dropdown-menu dropdown-menu-vertical" aria-labelledby="catalogoDropdown">
                <li><a class="dropdown-item" href="{{route('Periodos.index')}}">Periodos</a></li>
                <li><a class="dropdown-item" href="{{ route('Plazas.index') }}">Plazas</a></li>
                <li><a class="dropdown-item" href="{{ route('Puestos.index') }}">Puestos</a></li>
                <li><a class="dropdown-item" href="{{route('Alumnos2.index')}}">Alumnos</a></li>
                <li><a class="dropdown-item" href="{{route('Deptos.index')}}">Deptos.</a></li>
                <li><a class="dropdown-item" href="{{route('Carreras.index')}}">Carreras</a></li>
                <li><a class="dropdown-item" href="{{route('Reticulas.index')}}">Retículas</a></li>
                <li><a class="dropdown-item" href="{{route('Materias.index')}}">Materias</a></li>
                <li><a class="dropdown-item" href="{{route('MateriasA.index')}}">Materias Abiertas</a></li>
                <li><a class="dropdown-item" href="{{route('PersonalPlazas.index')}}">Personal Plaza</a></li>
                <li><a class="dropdown-item" href="{{route('Personal.index')}}">Personal</a></li>
                <li><a class="dropdown-item" href="{{route('Edificios.index')}}">Edificios</a></li>
                <li><a class="dropdown-item" href="{{route('Grupo.index')}}">Grupos</a></li>
                <li><a class="dropdown-item" href="{{route('Lugares.index')}}">Lugares</a></li>
            </ul>
        </li>

        <!-- Horarios Dropdown (Horizontal) -->
        <li class="nav-item dropdown" role="presentation">
            <a class="nav-link dropdown-toggle" href="#" id="horariosDropdown" role="button">Horarios</a>
            <ul class="dropdown-menu dropdown-menu-horizontal" aria-labelledby="horariosDropdown">
                <li><a class="dropdown-item" href="#">Docentes</a></li>
                <li><a class="dropdown-item" href="#">Alumnos</a></li>
            </ul>
        </li>

        <!-- Proyectos Ind. Dropdown (Horizontal) -->
        <li class="nav-item dropdown" role="presentation">
            <a class="nav-link dropdown-toggle" href="#" id="proyectosDropdown" role="button">Proyectos Ind.</a>
            <ul class="dropdown-menu dropdown-menu-horizontal" aria-labelledby="proyectosDropdown">
                <li><a class="dropdown-item" href="#">Capacitación</a></li>
                <li><a class="dropdown-item" href="#">Asesorías Doc.</a></li>
                <li><a class="dropdown-item" href="#">Proyectos</a></li>
                <li><a class="dropdown-item" href="#">Material Didáctico</a></li>
                <li><a class="dropdown-item" href="#">Docencia e Inv</a></li>
                <li><a class="dropdown-item" href="#">Asesorías Proyectos Ext.</a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{route('instrumentacion')}}" class="nav-link">Instrumentación</a>
        </li>
        <li class="nav-item">
            <a href="{{route('tutorias')}}" class="nav-link">Tutorías</a>
        </li>

        <!-- Periodo - Select -->
        <li class="nav-item">
            <select class="form-select" aria-label="Seleccionar periodo">
                <option selected disabled>Periodo</option>
                <option value="ene-jun-24">Ene-Jun 24</option>
                <option value="ago-dic-24">Ago-Dic 24</option>
                <option value="ene-jun-25">Ene-Jun 25</option>
            </select>
        </li>

        <!-- Enlaces de invitado -->
        @guest
        <li class="nav-item">
            <a href="{{route('login')}}" class="nav-link text-success">Login</a>
        </li>
        @endguest

        <!-- Enlace de logout para usuario autenticado -->
        @auth
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        @endauth
    </ul>

    <!-- Tab panes -->
    <div class="tab-content" id="myTabContent">
        
    </div>

    <script>
        var triggerEl = document.querySelector("#navId a");
        bootstrap.Tab.getInstance(triggerEl).show();
    </script>
</body>
</html>
