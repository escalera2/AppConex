<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Concesionaria</title>
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
  include "controlador/eliminar_cliente.php";

  ?>
  <div class="container-fluid row">
    <form class="col-4 p-3" method="POST">
      <h3 class="text-center text-secondary">Registro de Cliente</h3>
      <?php
      include "controlador/registro_persona.php";
      ?>

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre del Cliente</label>
        <input type="text" class="form-control" name="nombre">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Apellido Paterno</label>
        <input type="text" class="form-control" name="ApellidoP">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Apellido Materno</label>
        <input type="text" class="form-control" name="ApellidoM">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ci</label>
        <input type="text" class="form-control" name="carnet">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Telefono</label>
        <input type="text" class="form-control" name="telefono">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
        <input type="text" class="form-control" name="correo">
      </div>

      <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
      <button type="submit" class="btn btn-primary" name="btnMenu" value="ok">Volver Menu</button>
    </form>
    <div class="col-8 p-4">
      <table class="table">
        <thead class="bg-info">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">CI</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo electronico</th>
            <th scope="col">Acciones</th>

          </tr>
        </thead>
        <tbody>

          <?php
          include "modelo/conexion.php";
          $sql = $conexion->query(" select * from cliente");
          while ($datos = $sql->fetch_object()) { ?>
            <tr>
              <td><?= $datos->ID_Cliente ?></td>
              <td><?= $datos->Nombre ?></td>
              <td><?= $datos->Apellido_Paterno ?></td>
              <td><?= $datos->Apellido_Materno ?></td>
              <td><?= $datos->Ci ?></td>
              <td><?= $datos->Telefono ?></td>
              <td><?= $datos->correo_electronico ?></td>

              <td>
                <a href="modificar_cliente.php?id=<?= $datos->ID_Cliente ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                <a onclick="return eliminar()" href="index.php?id=<?= $datos->ID_Cliente ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
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