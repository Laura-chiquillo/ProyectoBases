<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1 align="center">LISTADO DE MEDICOS</h1>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        <td>Codigo</td>
        <td>Identificacion</td>
        <td>Nombre</td>
        <td>Apellidos</td>
        <td>Especialidad</td>
        <td>Telefono</td>
        <td>Correo</td>
    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
        ?>
            <tr>
                <td><?php echo $datos["idMedico"]?></td>
                <td><?php echo $datos["medIdentificacion"]?></td>
                <td><?php echo $datos["medNombres"]?></td>
                <td><?php echo $datos["medApellidos"]?></td>
                <td><?php echo $datos["medEspecialidad"]?></td>
                <td><?php echo $datos["medTelefono"]?></td>
                <td><?php echo $datos["medCorreo"]?></td>
            </tr>
            <?php   
        }

     ?>
    </table>

</body>
</html>