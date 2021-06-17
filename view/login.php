<?php
session_start();
require("verificar.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link href="inicio.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="login.php">
			<h1>Login</h1>
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
		</div>
	</body>
</html>
