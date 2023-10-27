<?php
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["nombre"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];

        $stmt = $conexion->prepare("CALL editar_departamento(?, ?)");
        $stmt->bind_param("is", $id, $nombre);
        $stmt->execute();
        $stmt->close();
        if ($sql == true) {
            header("location:index_departamento.php");
        } else {
            echo "<div class='alert alert-danger'>error al modificar deepartamento</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>campos vacios</div>";
    }
}
