<?php
   
   class Controller(){
       #conección con la vista
    public function plantilla(){
        include "view/view.php";
    }

    #conección al modelo y funcionamiento de subir archivo
    public function conectar(){
        include 'model.php';  
        
        if (isset($_POST['enviar'])){
            
        $filename=$_FILES["file"]["name"];
        $info = new SplFileInfo($filename);
        $extension = pathinfo($info->getFilename(), PATHINFO_EXTENSION);

        if($extension == 'csv'){
            $filename = $_FILES['file']['tmp_name'];
            $handle = fopen($filename, "r");

            while( ($data = fgetcsv($handle, 1000, ";") ) !== FALSE ){
            $q = "INSERT INTO importacion (nombre, apellido, correo) VALUES (
                '$data[0]', 
                '$data[1]',
                '$data[2]'
            )";

            $mysqli->query($q);
        }

            fclose($handle);
        }
        }
    }
   }



   ?>