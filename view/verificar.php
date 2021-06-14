<?php


//verifico si ingreso el nombre y la clave para consultar en la tabla
if(isset($_POST['Username'])&& isset($_POST['password'])){
    //verifico los espacios es blanco
    if (!empty(trim($_POST['Username'])) && !empty(trim($_POST['password']))){

    $Username = mysqli_real_escape_string($conn,htmlspecialchars(trim($_POST['Username'])));

    $query = mysqli_query($con, "SELECT * FROM 'usuario' WHERE username = '$Username'");
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);

         $usuapass = $row ['password'];
         $verificopass = password_verify($_POST['password'],$usuapass);

         if($verificopass === true){
               $_SESSION['username']= $Username;
               header('location:consultas.php');
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
