<?php
require "conexion.php";

$conexion = new mysqli($host,$user,$pass,$baseDatos);

if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "select * from medicos";

$resultado = $conexion->query($sql);
?>