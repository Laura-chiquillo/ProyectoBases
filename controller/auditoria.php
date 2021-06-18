<?php

include("../model/conexion.php")

$conectar1 = new Conexion(); 
$connec = $conectar1 -> conectar();

//verifico si ingreso el nombre y la clave para consultar en la tabla
if(isset($_POST['form_username'])&& isset($_POST['form_password'])){
    //verifico los espacios es blanco
    if (!empty(trim($_POST['form_username'])) && !empty(trim($_POST['form_password']))){

    $username = mysqli_real_escape_string($connec,htmlspecialchars(trim($_POST['form_username'])));
    
// realizo la consulta para ver si existe
    $query= mysqli_query($connec, "SELECT * FROM usuario WHERE username = '$username'");
    if(mysqli_num_rows($query) > 0){

        $user= mysqli_query($connec, "SELECT id FROM usuario WHERE username = '$username'");
        $usuario = mysqli_query($connec, "SELECT username FROM usuario WHERE username = '$username'");
        $fec = date("d-m-Y H:i, time()"); //Fecha
        $tip = 'LOGIN'; //accion
        $desc = "El usuario ".$usuario." ha iniciado sesion en la aplicación exitosamente"; // observación
        $ip = $_SERVER["REMOTE_ADDR"]; //ip
        
        $q ="INSERT INTO empleado VALUES ('$fec[1]','$user[2]','$tip[3]','$desc[4]','$ip[5]')";
    
        }
    }
}
?>