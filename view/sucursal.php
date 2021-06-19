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
    
     body{
	background-color: #435165;
	font-family: Arial;
}

#main-container{
	margin: 150px auto;
	width: 30px;
}

table{
    width: 150px;
    margin-left: auto;
    margin-right: auto;
   border: 1px solid #999;
   text-align: left;
   border-collapse: collapse;
   margin: 1 0 1em 0;
   caption-side: top;

}

th, td{
	padding: 20px;
}

thead{
	background-color: #3274d6;
	border-bottom: solid 5px #0F362D;
	color: white;
}

tr:nth-child(even){
	background-color: #ddd;
}

tr:hover td{
	background-color: #3274d6;
	color: white;
}
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
    width:10%;
    line-height: 60px;
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
    <li><a href="view.php?action=empleados">Empleados</a></li>
        <li><a href="sucursal.php?action=sucursal">Sucursal</a></li>
        <li><a href="empresa.php?action=empresa">Empresa</a></li>
        <li><a href="arl.php?action=arl">Arl</a></li>
        <li><a href="ciudadSucursal.php?action=ciudadSucursal">Ciudad sucursal</a></li>
        <li><a href="conceptoNomina.php?action=conceptoNomia">Concepto nomina</a></li>
        <li><a href="novedad.php?action=novedad">Novedad</a></li>
        <li><a href="pension.php?action=pension">Pension</a></li>
        <li><a href="salud.php?action=salud">Salud</a></li>
        <li><a href="mostraraud.php?action=auditoria">Auditoria</a></li>
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
            <td>id</td>
            <td>cod_Ciudad</td>
            <td>cod_Empresa</td>
            <td>Direccion</td>
            <td>Telefono</td>
            <td>Correo</td>
            <td>Escala</td>
        <?php
        $sql = " SELECT * from sucursal";
        $result= mysqli_query($connect, $sql);
        
        while($mostrar= mysqli_fetch_array($result)){
        ?>
        <tr>
        <td><?php echo $mostrar ['id']?></td>
        <td><?php echo $mostrar ['cod_Ciudad']?></td>
        <td><?php echo $mostrar ['cod_Empresa']?></td>
        <td><?php echo $mostrar ['direccion']?></td>
        <td><?php echo $mostrar ['telefono']?></td>
        <td><?php echo $mostrar ['correo']?></td>
        <td><?php echo $mostrar ['estado']?></td>
        
        </tr>
    <?php

    }
    ?>
    </table>

    </br>
</body>
</html>

