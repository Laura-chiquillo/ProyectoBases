<?php
//require("../model/conexion.php")

include ("../model/conexion.php");

$conectar1 = new Conexion(); 
$conne = $conectar1 -> conectar();
if (isset($_POST['enviar'])){
	
   $filename=$_FILES["file"]["name"];
   $info = new SplFileInfo($filename);
   $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
 
    if($extension == 'csv')   {
     $filename = $_FILES['file']['tmp_name'];
     $handle = fopen($filename, "r");
 
     while( ($data = fgetcsv($handle, 1000, ";") ) !== FALSE ){
        $q = "INSERT INTO empleado (`codigo`, `cod_Sucursal`, `cod_Pension`,`cod_Salud` ,`cod_Arl` , `nombres`,`apellidos` ,`dependencia`,`cargo`, `fechaIngreso`, `sueldo`, `estado`) VALUES ('$data[0]', 
         '$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]')";
 
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
</head>
<body>
    <form enctype="multipart/form-data" method="post" action="">
    CSV File:<input type="file" name="file" id="file">
    <input type="submit" value="Enviar" name="enviar">
    </form>
<a  href="login.php"> Login</a> 
<a  href="Tablas.php"> tabla</a>

</body>
</html>