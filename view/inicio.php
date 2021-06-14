<?php
session_start();
require_once("../model/conexion.php");
require("verificar.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"> 
<title>LOGIN</title>
</head>
<body>
<center>
<h1>LOGIN</h1>
   <form  action=""  method = "POST">
   <div class="container">
   <label for = "username"><b>USERNAME</b></label>
   <input type="text"  name ="Username" placeholder="Ingrese su Usuario" require>
  
   <label for = "password"><b>PASSWORD</b></label>
   <input type="password" name ="password" placeholder="Ingrese la contraseña" require>
   
   <button type= "submit">Send</button>
   <?php
   if(isset($success_message)){
      echo '<div class="$success_message">'.$success_message.'</div>';
   }
   if(isset($error_message)){
      echo '<div class="$error_message">'.$error_message.'</div>';
   }
?>
    
   </form>
</center>

</body>
</html>