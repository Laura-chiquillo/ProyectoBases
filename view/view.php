<?php
//require("../model/conexion.php")

include ("../model/conexion.php");

$conectar1 = new Conexion(); 
$conne = $conectar1 -> conectar();
//$conne = mysqli_connect ("","root","erara6e4","proyecto",3306);

if (isset($_POST['enviar'])){
	
   $filename=$_FILES["file"]["name"];
   $info = new SplFileInfo($filename);
   $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
 
    if($extension == 'csv')   {
     $filename = $_FILES['file']['tmp_name'];
     $handle = fopen($filename, "r");
 
     while( ($data = fgetcsv($handle, 1000, ";") ) !== FALSE ){
        $q ="INSERT INTO empleado VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]')";
 
         echo $q;
        
         mysqli_query($conne,$q);
     }
 
       fclose($handle);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>INICIO</title>
<style>
header{
    position: relative;
    margin:auto;
    text-align:center;
    padding:50px;
}
nav{
    position:relative;
    margin:auto;
    width:100%;
    height:auto;
    background:black;
}
nav ul{
    position:relative;
    margin:auto;
    width:50%;
    text-align:center;
}
nav ul li{
    display:inline-block;
    width:15%;
    line-height: 50px;
    list-style: none;
}
nav ul li a{
    color:white;
    text-decoration: none;
    
}
section{
    position: relative;
    padding: 100 px;
}
</style>
</head>
<body>
    <nav>
        <ul>
        <li><a href="view.php?action=empleados">Empleados</a></li>
        <li><a href="sucursal.php?action=sucursal">Sucursal</a></li>
        <li><a href="empresa.php?action=empresa">Empresa</a></li>
        <li><a href="arl.php?action=arl">Arl</a></li>
        <li><a href="ciudadSucursal.php?action=ciudadSucursal">Ciudad sucursal</a></li>
        <li><a href="conceptoNomina.php?action=conceptoNomia">Concepto nomina</a></li>
        <li><a href="novedad.php?action=novedad">Novedad</a></li>
        <li><a href="pension.php?action=pension">Pension</a></li>
        <li><a href="salud.php?action=salud">Salud</a></li>
        <li><a href="usuario.php?action=usuario">Usuario</a></li>
        <li><a  href="login.php"> Login</a>
        </ul>
    </nav>
    <header>
    <form enctype="multipart/form-data" method="post" action="">
    CSV File:<input type="file" name="file" id="file">
    <input type="submit" value="Enviar" name="enviar">
    </form>
    </header>
</body>
</html>
