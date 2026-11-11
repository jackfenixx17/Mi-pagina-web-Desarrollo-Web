<?php
// Datos de conexión al servidor local de base de datos
$servidor = "localhost";
$usuario = "root";
$password = "";
$base_datos = "portafolio_db";

// Crear conexión con MariaDB
$conexion = new mysqli($servidor, $usuario, $password, $base_datos);

// Verificar si ocurrió un error al conectar
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Configurar codificación de caracteres
$conexion->set_charset("utf8mb4");
?>