<?php

include ("../model/conexion.php");
$conectar1 = new Conexion(); 
$connec = $conectar1 -> conectar();
//verifico si ingreso el nombre y la clave para consultar en la tabla
if(isset($_POST['form_username'])&& isset($_POST['form_password'])){
    //verifico los espacios es blanco
    if (!empty(trim($_POST['form_username'])) && !empty(trim($_POST['form_password']))){

    $username = mysqli_real_escape_string($connec,htmlspecialchars(trim($_POST['form_username'])));
    
// realizo la consulta para ver si existe

    $query= mysqli_query($connec, "SELECT * FROM usuario WHERE username = '$username'");
//si existe el usuario 
    if(mysqli_num_rows($query) > 0){

        $row = mysqli_fetch_assoc($query);

         $usuapass = $row ['password'];
         
         $verificopass = password_verify($_POST['form_password'],password_hash($usuapass, PASSWORD_DEFAULT));
         if ($verificopass===false){
           
         }

         if($verificopass === true){
               $_SESSION['username']= $User;
               header('Location: index.php');
               exit;


         }
         else{
             $error_message = "Clave o Usuario incorrectos";
         }

    }
    else{
        $error_message ="Password o Username incorrectos";

    }
}
else{
    $error_message ="Por favor complete los campos ";
}
}
?>
