<?php
if (isset($_POST['enviar'])){
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
    <tfoot>
        <tr>
            <th>Empleados por ciudad y sucursal.</th>
            <th></th>

            <th>
                
                <form action="../controller/pdf.php" method="POST">
                <select name ='ciudad'>
                <option value="Bogota">Bogota</a></option>
                <option value="Cali">Cali</option>
                 <option value="Barranquilla">Barranquilla</option>
                 <option value="Pereira">Pereira</option>
                 <option value="Medellin">Medellin</option>
                <option value="Armenia">Armenia</option>
                 <option value="Neiva">Neiva</option>
                 <option value="Ibague">Ibague</option>
                 <option value="Cartagena">Cartagena</option>
                 <option value="Popayan">Popayan</option>
        </select>
       
            </th>
            <th>
            
           <input type="submit" value="PDF">
            
            </th>
        </tr>
        <tr>
            <th>Sumatoria de sueldos pagados por sucursal en un período determinado.</th>
            <th></th>
            <th></th>
            <th> 
           <a href="consu.html">ID</a>
        </tr>
        <tr>
            <th>Empleados que presente su código, nombre, sueldo, descuento por pensión (es el 4% del valor del sueldo), bonificación y total recibido.</th>
            <th></th>
            <th></th>
            <th> 
               <a href="consu2.html">codigo</a>
            </th>
        </tr>
        <tr>
            <th>Empleados en un rango de fechas que hayan tenido alguna novedad.</th>
            <th></th>
            <th> 
                <?php
                echo "<td><a href='../controller/consulta4.php'> <button type='button' class= 'btn btn-outline-success'>PDF</button></a></td>";
                ?>
            </th>
        </tr>
        <tr>
            <th>
                    Registro de auditoria
            </th>
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