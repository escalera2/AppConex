<?php

if (!empty($_POST["btneditar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["ApellidoP"]) and !empty($_POST["ApellidoM"]) and !empty($_POST["carnet"]) and !empty($_POST["telefono"]) and !empty($_POST["correo"])) {

        // El ID se toma automáticamente desde el campo oculto
        $ID_Cliente = $_POST["id"];
        $Nombre = $_POST["nombre"];
        $Apellido_Paterno = $_POST["ApellidoP"];
        $Apellido_Materno = $_POST["ApellidoM"];
        $Ci = $_POST["carnet"];
        $Telefono = $_POST["telefono"];
        $correo_electronico = $_POST["correo"];

        // Llamada al procedimiento almacenado
        $stmt = $conexion->prepare("CALL editar_cliente(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issssss", $ID_Cliente, $Nombre, $Apellido_Paterno, $Apellido_Materno, $Ci, $Telefono, $correo_electronico);
        $stmt->execute();
        $stmt->close();
        if ($sql == true) {
            header("location:clientes.php");
        } else {
            echo "<div class='alert alert-danger'>Error al editar cliente</div>";
        }
    } else {
        echo "<div class='alert alert-waring'>campos vacios</div>";
    }
}
