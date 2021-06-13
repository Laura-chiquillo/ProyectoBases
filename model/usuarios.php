<?php

require_once ('../model/conexion.php');

class Usuarios extends Conexion{

    public $mysqli;
    public $data;
    
    public function __construct(){
        $this->mysqli = parent::conectar();
        $this->data= array();
    }

    public function usuario(){
        $resultado = $this->mysqli->query("SELECT * FROM usuario");

        while ($fila = $resultado->ferch_assoc()){
            $data[] = $fila;
        }

        if (isset($data)){
            return $data;
        }
    }

    public function usuario_id($id){
        $consulta = sprintf("SELECT * FROM usuario WHERE id=2",
        parent::comillas_inteligentes($id));

        $resultado = $this->mysqli->query($consulta);
        $fila= $resultado->fetch_array();
        return $fila;
    }
}

?>