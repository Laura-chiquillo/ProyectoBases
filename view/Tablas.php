<?php
$conexion=mysqli_connect("localhost","root","", "proyecto");
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
<meta charset="UTF-8">  
<title> BASE DE DATOS EMPLEADOS</title>
</head>
<body>
    <br>
    <a  href="view.php"> atras</a> 
    <table border="1">
        <tr>
            <td>codigo</td>
            <td>codigoSucursal</td>
            <td>nombres</td>
            <td>apellidos</td>
            <td>dependencia</td>
            <td>cargo</td>
            <td>fechaIngreso</td>
            <td>sueldo</td>
        </tr>
        <?php
        $sql = " SELECT * from empleado";
        $result=mysqli_query($conexion, $sql);
        
        while($mostrar= mysqli_fetch_array($result)){
        ?>
        <tr>
        <td><?php echo $mostrar ['codigo']?></td>
        <td><?php echo $mostrar ['codigoSucursal']?></td>
        <td><?php echo $mostrar ['nombres']?></td>
        <td><?php echo $mostrar ['apellidos']?></td>
        <td><?php echo $mostrar ['dependencia']?></td>
        <td><?php echo $mostrar ['cargo']?></td>
        <td><?php echo $mostrar ['fechaIngreso']?></td>
        <td><?php echo $mostrar ['sueldo']?></td>
        </tr>
    <?php

    }
    ?>
    </table>

    </br>
</body>
</html>