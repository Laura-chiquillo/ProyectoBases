<?php
//require("../model/conexion.php")

$connect = mysqli_connect("localhost","root","", "proyecto");
//$conecectar = new Conexion();
//$connect = $conec->conectar();

if (isset($_POST['enviar'])){
	
   $filename=$_FILES["file"]["name"];
   $info = new SplFileInfo($filename);
   $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
 
    if($extension == 'csv')   {
     $filename = $_FILES['file']['tmp_name'];
     $handle = fopen($filename, "r");
 
     while( ($data = fgetcsv($handle, 1000, ";") ) !== FALSE ){
        $q = "INSERT INTO empleado (codigo, codigoSucursal, nombres, apellidos,dependencia,cargo, fechaIngreso, sueldo) VALUES ('$data[0]', 
         '$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]'); ";
 
        //echo $q;
        if ($connect->query($q)===true) {
         echo "Sisirvio";
         }
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