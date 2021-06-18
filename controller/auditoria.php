<?php

$connec = mysqli_connect ("192.168.1.14","root","erara6e4","proyecto",3306);
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
        $tip = 'login'; //accion
        $desc = "El usuario ".$username." ha iniciado sesion en la aplicación exitosamente"; // observación
        $ip = $_SERVER["REMOTE_ADDR"]; //ip
        $q = "INSERT INTO auditoria (fcha_audtria, usrio_audtria, accion_audtria, obsrvacion_audtria, address_audtria)VALUES ('','$fec','$user','$tip','$desc','$ip')";
        $result = mysqli_query($connec,$q);      
    
        }
    }
}
?>