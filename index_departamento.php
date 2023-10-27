<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>departamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e561c9602c.js" crossorigin="anonymous"></script>
</head>

<body>
    <script>
        function eliminar() {
            var respuesta = confirm("Estas seguro de elimnar?");
            return respuesta
        }
    </script>

    <h1 class="text-center p-3">Concesionaria</h1>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_departamento.php"
    ?>

    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Registro de departamento</h3>
            <?php
            include "controlador/resgistro_departamento.php";
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre del departamento</label>
                <input type="text" class="form-control" name="nombre">
            </div>

            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
        </form>
        <div class="col-6 p-7">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query(" SELECT * FROM departamento ");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->ID_Departamento ?></td>
                            <td><?= $datos->Nombre ?></td>
                            <td>
                                <a href="modificar_departamentos.php?id=<?= $datos->ID_Departamento ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="index_departamento.php?id=<?= $datos->ID_Departamento ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                    ?>

                </tbody>
            </table>
        </div>



    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>