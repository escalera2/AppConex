<?php
if (!empty($_POST["btnregistrar"])) {
    $Nombre = $_POST["nombre"];

    // Llamada al procedimiento almacenado
    $stmt = $conexion->prepare("CALL add_departamento(?)");
    $stmt->bind_param("s", $Nombre);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success">Departamento registrado correctamente</div>';

        // Redirigir después de procesar el formulario
        header("Location:index_departamento.php");
        exit();
    } else {
        echo '<div class="alert alert-danger">Error al registrar</div>';
    }

    $stmt->close();
}
