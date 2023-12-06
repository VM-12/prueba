<?php

$conexion = mysqli_connect("localhost", "root", " ", "crud");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
