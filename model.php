<?php
#conexión a la base de datos
$servername = "localhost";
$database = "databasename";
$username = "username";
$password = "password";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);
?>

<?php
#
$linea = 0;

$archivo = fopen("NÓMINA_EMPLEADOS.csv","r");
while (($datoa= fgetcav($archivo,";"))== true){
    $num = count($datos);
    $linea++;

    for ($columna=0; $columna < $num ; $columna++) { 
        echo $datos[0];
    }
}
fclose [$archivo];
?>