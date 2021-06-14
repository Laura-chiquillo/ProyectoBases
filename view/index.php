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
    padding:5px;
}
table{
    position: relative;
    margin:auto;
    text-align:center;
    padding:5px;
}
</style>
</head>
<body>
    <header>
            <a  href="login.php"> 
                <button type='button' class= 'btn btn-outline-success'>inicio</button>
            </a>
    </header>

    <table id="theTable" class="display" border="1" style="width: 50%">
    <tfoot>
        <tr>
            <th>empleados por ciudad y sucursal.</th>
            <th>
                <?php
                echo "<td><a href='../controller/pdf.php'> <button type='button' class= 'btn btn-outline-success'>PDF</button></a></td>";
                ?>
            </th>
        </tr>
        <tr>
            <th>Sumatoria de sueldos pagados por sucursal en un período determinado.</th>
            <th> 
                <?php
                echo "<td><a href='../controller/consulta2.php'> <button type='button' class= 'btn btn-outline-success'>PDF</button></a></td>";
                ?>
            </th>
        </tr>
        <tr>
            <th>empleados que presente su código, nombre, sueldo, descuento por pensión (es el 4% del valor del sueldo), bonificación y total recibido.</th>
            <th> 
                <?php
                echo "<td><a href='../controller/consulta3.php'> <button type='button' class= 'btn btn-outline-success'>PDF</button></a></td>";
                ?>
            </th>
        </tr>
        <tr>
            <th>empleados en un rango de fechas que hayan tenido alguna novedad.</th>
            <th> 
                <?php
                echo "<td><a href='../controller/consulta4.php'> <button type='button' class= 'btn btn-outline-success'>PDF</button></a></td>";
                ?>
            </th>
        </tr>
        <tr>
            <th></th>
            <th> 
                <?php
                echo "<td><a href='../controller/consulta5.php'> <button type='button' class= 'btn btn-outline-success'>PDF</button></a></td>";
                ?>
            </th>
        </tr>
    </tfoot>
</table>
</body>
</html>