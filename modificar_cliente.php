<?php
include "modelo/conexion.php";
$id = $_GET["id"];
$sql = $conexion->query("select * from cliente where ID_Cliente=$id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h5 class="text-center text-secondary">Modificar de Cliente</h5>
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
        <?php
        include "controlador/modificar_cliente.php";


        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->Nombre ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" name="ApellidoP" value="<?= $datos->Apellido_Paterno ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" name="ApellidoM" value="<?= $datos->Apellido_Materno ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ci</label>
                <input type="text" class="form-control" name="carnet" value="<?= $datos->Ci ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="telefono" value="<?= $datos->Telefono ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
                <input type="text" class="form-control" name="correo" value="<?= $datos->correo_electronico ?>">
            </div>

        <?php }
        ?>
        <button type="submit" class="btn btn-primary" name="btneditar" value="ok">Modificar cliente</button>
    </form>
</body>

</html>