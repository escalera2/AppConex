<?php
if (!empty($_POST["btnregistrar"])) {
    // Función para comprobar si una cadena contiene solo dígitos
    function isNumeric($value)
    {
        return ctype_digit($value);
    }

    if (
        !empty($_POST["nombre"]) &&
        !empty($_POST["ApellidoP"]) &&
        !empty($_POST["ApellidoM"]) &&
        !empty($_POST["carnet"]) &&
        !empty($_POST["telefono"]) &&
        !empty($_POST["correo"])
    ) {
        $Nombre = $_POST["nombre"];
        $Apellido_Paterno = $_POST["ApellidoP"];
        $Apellido_Materno = $_POST["ApellidoM"];
        $Ci = $_POST["carnet"];
        $Telefono = $_POST["telefono"];
        $correo_electronico = $_POST["correo"];

        // Comprobar si el teléfono contiene solo dígitos
        if (!isNumeric($Telefono)) {
            echo '<div class="alert alert-warning">Ingrese solo números en el campo Telefono</div>';
        } else {
            // Comprobar si el carnet contiene solo dígitos
            if (!isNumeric($Ci)) {
                echo '<div class="alert alert-warning">Ingrese solo números en el campo Ci carnet</div>';
            } else {
                // Llamada al procedimiento almacenado
                $stmt = $conexion->prepare("CALL add_cliente(?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $Nombre, $Apellido_Paterno, $Apellido_Materno, $Ci, $Telefono, $correo_electronico);

                if ($stmt->execute()) {
                    echo '<div class="alert alert-success">Cliente registrado correctamente</div>';

                    // Redirigir después de procesar el formulario esto para que no se vuelva a reenviar los datos 
                    header("Location:clientes.php");
                    exit();
                } else {
                    echo '<div class="alert alert-danger">Error al registrar</div>';
                }

                $stmt->close();
            }
        }
    } else {
        echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
    }
}
