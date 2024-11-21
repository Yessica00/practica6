<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Documentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Subir Documentos</h1>

        <form>
            <div class="mb-3">
                <label for="curp" class="form-label">CURP</label>
                <input type="file" name="curp" id="curp" class="form-control">
            </div>

            <div class="mb-3">
                <label for="acta_nacimiento" class="form-label">Acta de Nacimiento</label>
                <input type="file" name="acta_nacimiento" id="acta_nacimiento" class="form-control">
            </div>

            <div class="mb-3">
                <label for="titulo_preparatoria" class="form-label">Título de la Preparatoria</label>
                <input type="file" name="titulo_preparatoria" id="titulo_preparatoria" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Subir Documentos</button>
        </form>
    </div>
</body>
</html>
