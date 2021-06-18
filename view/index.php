<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>INICIO</title>
<<<<<<< HEAD
<style>
    
    body{
	background-color: #435165;
	font-family: Arial;
}

#main-container{
	margin: 150px auto;
	width: 600px;
}

table{
   position: absolute;
   left: 50%;
   margin-left: -300px;
   top: 50%;
   margin-top: -300px;
   background-color: white;
   text-align: left;
   border-collapse: collapse;
   width: 100%;
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


</style>
</head>
<body>
    
    <table id="theTable" class="display" border="0" style="width: 50%">
=======

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
>>>>>>> 0d2f915aabcb80fea3555a24f415bb4758a3bc74
    <tfoot>
        <tr>
            <th>Empleados por ciudad y sucursal.</th>
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
            <th>Empleados que presente su código, nombre, sueldo, descuento por pensión (es el 4% del valor del sueldo), bonificación y total recibido.</th>
            <th> 
                <?php
                echo "<td><a href='../controller/consulta3.php'> <button type='button' class= 'btn btn-outline-success'>PDF</button></a></td>";
                ?>
            </th>
        </tr>
        <tr>
            <th>Empleados en un rango de fechas que hayan tenido alguna novedad.</th>
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