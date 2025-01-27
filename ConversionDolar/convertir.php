<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversion de Monedas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

    <?php

        $dolares=$_POST['dolares'];
        $euros=$dolares*0.95;

    ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-sm-6 border border-dark">Dólares</div>
            <div class="col-sm-6 border border-dark"><?= $dolares ?></div>
        </div>
        <div class="row">
            <div class="col-sm-6 border border-dark">Euros</div>
            <div class="col-sm-6 border border-dark"><?= $euros ?></div>
        </div>
    </div>
</body>
</html>