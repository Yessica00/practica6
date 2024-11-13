<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])

    <style>
        /* Ajustes de la página */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f4f4f9;
        }

        /* Contenedor centralizado */
        .center-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        /* Texto de bienvenida */
        .center-text {
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            color: #2c3e50;
            background: linear-gradient(45deg, #3498db, #2ecc71);
            -webkit-background-clip: text;
            color: transparent;
            animation: fadeIn 1s ease;
        }

        /* Efecto de fade-in */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Estilos de footer */
        footer {
            background-color: #444a56; /* Cambiado a un tono gris más claro */
            color: #ecf0f1;
            padding: 15px 0;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        footer a {
            color: #ecf0f1;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: #3498db;
        }
    </style>
    <title>Document</title>
</head>
<body>

    @include("menu")

    <div class="center-container">
        @yield("contenido1")
        @empty($__env->yieldContent('contenido1'))
        @endempty
    </div>

    <footer class="footer mt-auto py-3">
        <div class="container text-center">
            <a href="https://www.php.net/" target="_blank">PHP</a>
            <a href="https://www.laravel.com/" target="_blank">LARAVEL</a>
            <a href="https://lenguajehtml.com/html/" target="_blank">HTML</a>
            <a href="http://javascript.com" target="_blank">JAVASCRIPT</a>
            <a href="https://developer.mozilla.org/es/docs/Learn/Getting_started_with_the_web/CSS_basics" target="_blank">CSS</a>
        </div>
    </footer>
</body>
</html>

