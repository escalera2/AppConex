<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'concesionarias';

$conexion = mysqli_connect($host, $user, $pass, $db);
if ($conexion) {
    echo "Base de datos conectada";
} else {
    echo "no se puede establecer conexion con la base de datos";
}

return $conexion;
