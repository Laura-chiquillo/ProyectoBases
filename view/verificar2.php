<?php

$conne = mysqli_connect ("192.168.1.14","root","erara6e4","proyecto",3306);
//verifico si ingreso el nombre y la clave para consultar en la tabla
if(isset($_POST['username'])&& isset($_POST['password'])){
    //verifico los espacios es blanco
    if (!empty(trim($_POST['username'])) && !empty(trim($_POST['password']))){

    $username = mysqli_real_escape_string($conne,htmlspecialchars(trim($_POST['username'])));
    
// realizo la consulta para ver si existe

    $query= mysqli_query($conne, "SELECT * FROM admin WHERE username = '$username'");
//si existe el usuario 
    if(mysqli_num_rows($query) > 0){

        $row = mysqli_fetch_assoc($query);

         $usuapass = $row ['password'];
         
         $verificopass = password_verify($_POST['password'],password_hash($usuapass, PASSWORD_DEFAULT));
         if ($verificopass===false){
           
         }

         if($verificopass === true){
               $_SESSION['username']= $User;
               header('Location: view.php');
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
