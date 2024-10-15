@extends('inicio2')

@section("contenido1")

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    nav {
    width: 200px;
    height: 100vh;
    background-color: #f8f9fa;
    padding: 15px;
}

nav a {
    display: block;
    margin: 5px 0;
    color: #333;
    text-decoration: none;
}

nav a:hover {
    background-color: #e2e6ea;
    border-radius: 5px;
}

  </style>
</head>
<body>
  <div class="d-flex">
    <nav class="nav flex-column bg-light p-3" style="width: 200px; height: 100vh;">
        <a class="nav-link active" href="#">Periodos</a>
        <a class="nav-link" href="#">Plazas</a>
        <a class="nav-link" href="#">Puestos</a>
        <a class="nav-link" href="#">Personal</a>
        <a class="nav-link" href="#">Deptos.</a>
        <a class="nav-link" href="#">Carreras</a>
        <a class="nav-link" href="#">Retículas</a>
        <a class="nav-link" href="#">Materias</a>
        <a class="nav-link" href="#">Alumnos</a>
    </nav>

    <div class="flex-grow-1 p-4">
        <h1>Contenido </h1>
    </div>
</div>
</body>
</html>
@endsection