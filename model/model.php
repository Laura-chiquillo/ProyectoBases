<?php 
require_once 'conexion.php';

class consulta extends Conexion(){

    public $connect;
    public $data;

    public function __construct(){
        $this->connect = parent::conectar();
        $this->data = array();
    }

    //listar consultas
    public function consultasSucursal($id){
        $consulta = sprintf("SELECT * FROM sucursal", parent::comillas_inteligentes($id));
       $resultado = $this->connect->query($consulta);
       while ($fila = $resultado->fetch_assoc()) {
           $data[] = $fila;
       }
       if (isset($data)) {
           return $data;
       } 
    }
}

?>