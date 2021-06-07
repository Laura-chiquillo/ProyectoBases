<?php
Class Conexion {

    public function conectar(){
    $connect = @new mysqli("localhost","root","", "proyecto");
    
    if ($connect->connect_errno)
    header('Location: /');
    
    $connect->set_charset('utf8');
    
    return $connect;
    }
    
    }
?>