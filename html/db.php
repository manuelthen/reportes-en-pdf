<?php

$host = "db";  // Si usas Docker, pon el nombre del servicio
$user = "root";  
$password = "root";  
$database = "sistema_reportes"; 

$conexion = mysqli_connect($host, $user, $password, $database);

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}


?>