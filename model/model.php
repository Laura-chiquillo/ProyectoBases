<?php

$host = "localhost";
$dbuser = "root";
$dbpwd = "";
$db = "proyecto";

$connect = mysql_connect ($host, $dbuser,$dbpwd);
    if(!$connect)
        echo ("no se ha conectado a la base de datos");
    else 
        $slect = mysql_connect($db);
?>