<?php
if (!empty($_GET["id"])) {
    $ID_Cliente = $_GET["id"];

    // Llamar al procedimiento almacenado eliminar_cliente
    $stmt = $conexion->prepare("CALL eliminar_Departamento(?)");
    $stmt->bind_param("i", $ID_Cliente); // 'i' indica que el parámetro es de tipo entero

    // Ejecutar el procedimiento almacenado
    if ($stmt->execute()) {
        echo '<div class="alert alert-success" id="mensaje">Departamento ELIMINADO CORRECTAMENTE</div>';
    } else {
        echo '<div class="alert alert-danger" id="mensaje">ERROR AL ELIMINAR DEPARTAMENTO</div>';
    }

    $stmt->close();
}
?>
<script>
    // Esperar 3 segundos (3000 milisegundos) y luego ocultar el mensaje
    setTimeout(function() {
        document.getElementById("mensaje").style.display = "none";
    }, 2000);
</script>