<?php

require("../model/usuarios.php");

$objusuario = new Usuarios();
$usurios = $objusuario->usuario();

if (sizeof($usuarios) > 0) {
    ?>
    <table id="usuario" class="display table table-bordered table-stripe" cellspacing="0" width="100%">
    <thead>
    <tr>
    <th>nombre usuario</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($usuarios as $row){
        ?>
        <tr>
        <td><?php echo $row['username']; ?> </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    </table>
    <?php
} else {
    echo "no hay resultados.....";
}
?>