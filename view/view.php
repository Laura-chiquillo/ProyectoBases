<?php 

// conexión
$mysqli = @new mysqli('localhost',"laura","tisoruno123", "proyecto");

if (isset($_POST['enviar']))
{
	
  $filename=$_FILES["file"]["name"];
  $info = new SplFileInfo($filename);
  $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);

   if($extension == 'csv')
   {
	$filename = $_FILES['file']['tmp_name'];
	$handle = fopen($filename, "r");

	while( ($data = fgetcsv($handle, 1000, ";") ) !== FALSE )
	{
	   $q = "INSERT INTO importacion (codigo, codigoSede, nombres, apellidos, fechaIngreso, sueldo, arl) VALUES (
        '$data[0]', 
        '$data[1]',
        '$data[2]',
        '$data[3]', 
        '$data[4]',
        '$data[5]',
        '$data[6]'
    )";

	$mysqli -> query($q);
    #echo "se subio";
        #$mysql_query($q);
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
    <table></table>
    </h1>
</body>
</html>