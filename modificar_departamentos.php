<?php
include "modelo/conexion.php";
$id = $_GET["id"];
$sql = $conexion->query("select * from departamento where ID_Departamento=$id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center text-secondary">Modificar departamento</h3>
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
        <?php
        include "controlador/modificar_departamento.php";
        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre del departamento</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->Nombre ?>">
            </div>
        <?php }
        ?>


        <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar deepartamento</button>
    </form>
</body>

</html>