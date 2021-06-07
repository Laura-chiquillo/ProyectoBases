<?php

require("../model/sucursales.php");

$objsucursal = new Sucursales();
$sucursales= $objsucursal->sucursal();
if (sizeof($sucursales) > 0 ) {
    ?>
    <table id="sucursal" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
    <thead>
    <tr>
    <th>DNI</th>
    <th>NOMBRE</th>
    <th>GENERO</th>
    <th>DIRECCION</th>
    <th>HISTORIAL</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($sucursales as $row){
        ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['correo'].' '.$row['teleforno'] ?></td>
        <td>
        <a href="controlador.php?id=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Historial consulta</a>
        </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    </table>
    <?php
}else{
    echo "no hay resultados";
}
?>