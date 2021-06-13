<?php
class Conexion{
public function conectar(){

$servername ="192.168.1.7";
$database = "proyecto";
$username = "root";
$password = "erara6e4";
header("Content-Type: text/html ; charset-utf-8");

//$conn = mysqli_connect ($servername,$username,$password,$database,3306);
$conn = mysqli_connect ("localhost","root","","proyecto",3306);
if (!$conn){
       die("Conexion fallida:" . mysqli_connect_error());
}
echo "Connect successfully";
return $conn;
}
}
?>