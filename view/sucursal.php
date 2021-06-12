<?php

$connect = mysqli_connect("192.168.1.7","root","erara6e4", "proyecto",3306);

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