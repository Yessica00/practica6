<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Estilos de navegación */
        .nav-tabs {
            background-color: #ffffff;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .nav-tabs .nav-link {
            color: #333;
            font-weight: bold;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        /* Efecto hover */
        .nav-tabs .nav-link:hover {
            color: #007bff; /* Cambia a azul al pasar el cursor */
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
            color: #dc3545;
        }

        /* Fondo blanco general y color del texto */
        body {
            background-color: #ffffff;
            color: #333;
            font-family: Arial, sans-serif;
        }
    </style>
    <title>Menu de Navegación</title>
</head>
<body>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="navId" role="tablist">
        <li class="nav-item">
            <a href="#tab1Id" class="nav-link active" data-bs-toggle="tab" aria-current="page">Bienvenidos</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Acerca de</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Contáctanos</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Ayuda</a>
        </li>

        <!-- Enlaces de invitado -->
        @guest
        <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link text-success">Login</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link text-danger">Register</a>
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
        <div class="tab-pane fade show active" id="tab1Id" role="tabpanel">Bienvenidos</div>
        <div class="tab-pane fade" id="tab2Id" role="tabpanel">Acerca de</div>
        <div class="tab-pane fade" id="tab3Id" role="tabpanel">Contáctanos</div>
        <div class="tab-pane fade" id="tab4Id" role="tabpanel">Ayuda</div>
    </div>

    <script>
        var triggerEl = document.querySelector("#navId a");
        bootstrap.Tab.getInstance(triggerEl).show(); // Select tab by name
    </script>

    @auth
    <div class="user-info">
        <p>{{ Auth::user()->name }}</p>
        <p>{{ Auth::user()->email }}</p>
    </div>
    @endauth

</body>
</html>

