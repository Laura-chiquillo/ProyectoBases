<?php
require_once 'conexion.php';

class sucursales extends Conexion{
    public $connect;
    public $data;

    public function __construct(){
        $this->connect = parent::conectar();
        $this->data = array();
    }

    //listamos sucursales
    public function sucursal(){
        $resultado = $this->connect->query("SELECT * FROM sucursal");
        while ($fila = $resultado->fetch_assoc()) {
            $data[] = $fila;
        }

        if (isset($data)) {
            return $data;
        }
    }

    // sucursal por id
    public function sucursal_id ($id){
        $consulta = sprintf("SELECT * FROM sucursal WHERE id ",
        parent::comillas_inteligentes($id));
        
        $resultado = $esto->connect->consulta ( $consulta);
        $fila = $resultado->ferch_array(); return$fila;
    }
}

?>