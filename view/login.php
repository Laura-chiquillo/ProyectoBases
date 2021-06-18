<?php
session_start();
//require("../controller/auditoria.php");
require("verificar.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Usuario</title>
		
		
<style>
*{
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
body {
    background-color: #435165;
}
.inicio{
    width: 400px;
    background-color: #ffffff;
    box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
    margin: 100px auto;
}
.inicio h1 {
    text-align: center;
    color: #5b6574;
    font-size: 24px;
    padding: 20px 0 20px 0;
    border-bottom: 1px solid #dee0e4;
}
.inicio form {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding-top: 20px;
}
.inicio form label {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50px;
    height: 50px;
    background-color: #3274d6;
    color: #ffffff;
}
.inicio form input[type="password"], .inicio form input[type="text"] {
    width: 310px;
    height: 50px;
    border: 1px solid #dee0e4;
    margin-bottom: 20px;
    padding: 0 15px;
}
.inicio form input[type="submit"] {
    width: 100%;
    padding: 15px;
   margin-top: 20px;
    background-color: #3274d6;
    border: 0;
    cursor: pointer;
    font-weight: bold;
    color: #ffffff;
    transition: background-color 0.2s;
}
.inicio form input[type="submit"]:hover {
  background-color: #2868c7;
    transition: background-color 0.2s;
}

</style>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
	<div class="inicio">
			<h1> Login Usuario </h1>
			<form action="" method="POST">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" placeholder="Ingrese su Usuario" id ="username" name ="form_username" required >
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" placeholder="Ingrese la contraseña" id="password" name ="form_password"required>
				<input type="submit" value="Login">
                
                <?php
   					if(isset($error_message)){
    				  echo '<div class="$error_message">'.$error_message.'</div>';
   }
?>
			</form>
            <a  href="Admin.php"> ADMIN</a>
		</div>

	</body>
</html>
