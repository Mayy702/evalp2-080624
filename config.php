<?php
$servidor = "localhost";
$usuario = "root";
$password = "";  // Generalmente vacío en XAMPP
$basedatos = "evalp2_db";

$conexion = new mysqli($servidor, $usuario, $password, $basedatos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>