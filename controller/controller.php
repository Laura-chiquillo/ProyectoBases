<?php
   
   class Controller(){
    
    #conección al modelo y funcionamiento de subir archivo
    public function conectar(){
        require_once("../model/model.php");
        $modelo = modelo();
        $mod= $modelo->subirArchivo();
        include "view/view.php";
    }
        
   }



   ?>