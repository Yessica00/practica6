<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Inscripción')</title>

    <!-- Bootstrap y estilos personalizados -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Estilos personalizados -->
    <style>
        body {
            background: linear-gradient(135deg, #e9ecef, #f8f9fa); /* Fondo suave con degradado */
            font-family: 'Poppins', sans-serif;
            color: #495057;
            min-height: 100vh;
            margin: 0;
        }

        /* Menú fijo */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999; /* Asegura que el menú esté por encima del contenido */
            background-color: #343a40;
        }

        .navbar .nav-link {
            color: #fff;
        }

        .navbar .nav-link:hover {
            color: #007bff;
        }

        /* Asegurar que el contenido no se superponga al menú */
        .content-container {
            margin-top: 50px; /* Reducción del espacio superior */
        }

        .form-container {
            max-width: 600px;
            width: 100%;
            padding: 40px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        .form-container:before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(0, 123, 255, 0.1);
            border-radius: 50%;
        }

        .form-container:after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: rgba(0, 123, 255, 0.1);
            border-radius: 50%;
        }

        .form-container h1 {
            text-align: center;
            font-size: 30px;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 500;
            color: #495057;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 8px;
            font-size: 14px;
            padding-left: 40px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 16px;
            color: #6c757d;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff, #6610f2);
            border: none;
            font-size: 16px;
            font-weight: bold;
            padding: 15px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #6610f2, #007bff);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.3);
        }

        .footer {
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            position: absolute;
            bottom: 20px;
            width: 100%;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Animación */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div>
        @include('menu2') <!-- Menú fijo en la parte superior -->
    </div>
    
    <div class="content-container">
        <div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="form-container">
                @yield('content')
            </div>
        </div>
    </div>

  

    <!-- JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
