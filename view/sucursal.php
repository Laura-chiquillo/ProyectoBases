<?php

include ("../model/conexion.php");

$conectar1 = new Conexion(); 
$connect = $conectar1 -> conectar();

if (isset($_POST['enviar'])){
	
   $filename=$_FILES["file"]["name"];
   $info = new SplFileInfo($filename);
   $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
 
    if($extension == 'csv')   {
     $filename = $_FILES['file']['tmp_name'];
     $handle = fopen($filename, "r");
 
     while( ($data = fgetcsv($handle, 1000, ";") ) !== FALSE ){
        $q = "INSERT INTO sucursal  VALUES ('$data[0]', '$data[1]','$data[2]','$data[3]', '$data[4]','$data[5]','$data[6]'); ";
 
         echo $q;
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
    width:100%;
    text-align:center;
}
nav ul li{
    display:inline-block;
    width:24%;
    line-height: 50px;
    list-style: none;
}
nav ul li a{
    color:white;
    text-decoration: none;
}
</style>
</head>
<body>
    <nav>
        <ul>
        <a href="view.php?action=empleados">Empleados</a>
        <a href="sucursal.php?action=sucursal">Sucursal</a>
        <a href="empresa.php?action=empresa">Empresa</a>
        <a href="arl.php?action=arl">Arl</a>
        <a href="ciudadSucursal.php?action=ciudadSucursal">Ciudad sucursal</a>
        <a href="conceptoNomina.php?action=conceptoNomia">Concepto nomina</a>
        <a href="novedad.php?action=novedad">Novedad</a>
        <a href="pension.php?action=pension">Pension</a>
        <a href="salud.php?action=salud">Salud</a>
        <a href="usuario.php?action=usuario">Usuario</a>
        <a  href="login.php"> Login</a>
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
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
<meta charset="UTF-8">  
<title> BASE DE DATOS EMPLEADOS</title>
</head>
<body>
    <br>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Descripcion Pension</td>
            <td>Estado</td>
        </tr>
        <?php
        $sql = " SELECT * from pension";
        $result= mysqli_query($connect, $sql);
        
        while($mostrar= mysqli_fetch_array($result)){
        ?>
        <tr>
        <td><?php echo $mostrar ['id']?></td>
        <td><?php echo $mostrar ['desc_pension']?></td>
        <td><?php echo $mostrar ['estado']?></td>
        </tr>
    <?php

    }
    ?>
    </table>

    </br>
</body>
</html>

