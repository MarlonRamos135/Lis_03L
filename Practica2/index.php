<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Calculadora de CUM</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">Calculadora de CUM</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Agregar materia</a>
            
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Uv</th>
                    <th>Notas</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                <?php
                    $materias = simplexml_load_file('materias.xml');
                    $cum = 0;
                    $numerador = 0;
                    $denominador = 0;
                    foreach ($materias->materia as $materia) {
                        $numerador += $materia->nota * $materia->uvs;
                        $denominador += $materia->uvs;
                ?>
                <tr>
                    <td><?= $materia->codigo ?></td>
                    <td><?= $materia->nombre ?></td>
                    <td><?= $materia->uvs ?></td>
                    <td><?= $materia->nota ?></td>
                    <td>
                        <a href="#modificar" class="btn btn-success edit-btn" data-toggle="modal" 
                           data-codigo="<?= $materia->codigo ?>" 
                           data-nombre="<?= $materia->nombre ?>" 
                           data-uvs="<?= $materia->uvs ?>" 
                           data-nota="<?= $materia->nota ?>">Editar</a>
                        <a href="borrar.php?codigo=<?= $materia->codigo ?>" class="btn btn-danger">Borrar</a>
                    </td>
                </tr>
                <?php 
                    } 
                ?>
                </tbody>
            </table>
            
            <?php 
                if ($denominador != 0) {
                    $cum = round($numerador / $denominador, 2);
                    echo "<h2>CUM: $cum</h2>";
                }
            ?>
        </div>
    </div>
</div>

<!-- Modal para modificar materia -->
<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Modificar Materia</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editar.php">
                        <input type="hidden" name="codigo_original" id="codigo_original">
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="codigo">Codigo:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class ="form-control" name="codigo" id="codigo" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="nombre">Nombre:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" id="nombre" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="uvs">UVS:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" min="2" max="5" class="form-control" name="uvs" id="uvs" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-2">
                                <label class="control-label" for="nota">Nota:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="number" min="0" max="10" step="0.1" class="form-control" name="nota" id="nota" required>
                            </div>
                        </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="modificar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Modificar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include("nueva_modal.php");
    if(isset($_GET['exito']));
?>

<script>
        alertify.success('materia agregada existosamente')
</script>


<script>
    $(document).ready(function() {
        $('.edit-btn').on('click', function() {
            var codigo = $(this).data('codigo');
            var nombre = $(this).data('nombre');
            var uvs = $(this).data('uvs');
            var nota = $(this).data('nota');

            $('#codigo_original').val(codigo);
            $('#codigo').val(codigo);
            $('#nombre').val(nombre);
            $('#uvs').val(uvs);
            $('#nota').val(nota);
        });
    });
</script>

</body>
</html>