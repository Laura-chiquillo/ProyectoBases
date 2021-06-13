<?php

require_once 'conexion.php';
class Consulta extends Conexion{

    public $mysqli;
    public $data;

    public function __construct(){
        $this->mysqli = parent::conectar();
        $this->data = array();
    }

    public function consultaEmpleado($codigo){
        $consulta = sprintf("SELECT * FROM empleado", parent::comillas_inteligentes($codigo));

        $resultado = $this->mysqli->query($consulta);

        while( $fila = $resultado->fetch_assoc() ){
        $data[] = $fila;
        }

        if (isset($data)) {
        return $data; 
        } 
    }
}
?>