<?php
// Si el formulario es enviado, muestra los horarios correspondientes
$turno = isset($_POST['turno']) ? $_POST['turno'] : '';
$horarios = [];

if ($turno === 'mañana') {
    $horarios = [
        '7:00 AM - 8:00 AM',
        '8:00 AM - 9:00 AM',
        '9:00 AM - 10:00 AM',
        '10:00 AM - 11:00 AM',
    ];
} elseif ($turno === 'tarde') {
    $horarios = [
        '1:00 PM - 2:00 PM',
        '2:00 PM - 3:00 PM',
        '3:00 PM - 4:00 PM',
        '4:00 PM - 5:00 PM',
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Turno</title>
    <!-- Cargar Bootstrap desde CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
        }
        .btn-option {
            margin: 10px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-option:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Seleccionar Turno</h1>

        <!-- Formulario para seleccionar el turno -->
        <form method="POST" class="text-center">
            <button type="submit" name="turno" value="mañana" class="btn btn-option">Horario de la Mañana</button>
            <button type="submit" name="turno" value="tarde" class="btn btn-option">Horario de la Tarde</button>
        </form>

        <?php if ($turno): ?>
            <h2 class="text-center mt-4">Horarios Disponibles - <?php echo $turno === 'mañana' ? 'Mañana' : 'Tarde'; ?></h2>
            <table class="table table-hover mt-3">
                <thead>
                    <tr>
                        <th class="text-center">Horario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($horarios as $horario): ?>
                        <tr>
                            <td class="text-center"><?php echo $horario; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <!-- Incluir Bootstrap JS desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
