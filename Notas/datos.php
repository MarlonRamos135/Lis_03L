<?php 
    if(isset($_POST['nombre'])){
        $alumno["nombre"] = $_POST['nombre'] ?? "";
        $alumno["nota1"] = floatval($_POST['nota1'] ?? 0);
        $alumno["nota2"] = floatval($_POST['nota2'] ?? 0);
        $alumno["nota3"] = floatval($_POST['nota3'] ?? 0);

        $alumno["nota_final"] = ($alumno["nota1"])*0.50 + ($alumno["nota2"])*0.30 + ($alumno["nota3"])*0.20;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas del Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-4">
        <h2 class="mb-3">Resultados del Alumno</h2>
        
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Nota Final</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= htmlspecialchars($alumno["nombre"] ?? ""); ?></td>
                    <td><?= $alumno["nota1"] ?? 0; ?></td>
                    <td><?= $alumno["nota2"] ?? 0; ?></td>
                    <td><?= $alumno["nota3"] ?? 0; ?></td>
                    <td><strong><?= $alumno["nota_final"] ?? 0; ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
