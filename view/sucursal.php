<?php

$connect = mysqli_connect("192.168.1.16","root","erara6e4", "proyecto",3306);

if (isset($_POST['enviar'])){
	
   $filename=$_FILES["file"]["name"];
   $info = new SplFileInfo($filename);
   $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);
 
    if($extension == 'csv')   {
     $filename = $_FILES['file']['tmp_name'];
     $handle = fopen($filename, "r");
 
     while( ($data = fgetcsv($handle, 1000, ";") ) !== FALSE ){
        $q = "INSERT INTO pension  VALUES ('$data[0]', '$data[1]','$data[2]'); ";
 
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
</head>
<body>
    <form enctype="multipart/form-data" method="post" action="">
    CSV File:<input type="file" name="file" id="file">
    <input type="submit" value="Enviar" name="enviar">
    </form>
    <h1>
    </h1>
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