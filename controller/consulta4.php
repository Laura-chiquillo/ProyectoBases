<?php

date_default_timezone_set('America/Bogota');
require('../model/tabla.php');

class CONSULTAS4 extends PDF_MySQL_Table{

    function Header()
    {
        // Title
        $this->SetFont('Arial','',12);
        $this->Image('../UB-XYZ.jpg',180,5,-700);
        $this->Ln(10);
        $this->Cell(0,6,' (SR-Solutions) - empresa UB-XYZ',0,1,'C');
        $this->Cell(40,10,date('Y-m-d H:i:s'),0,1,'L');
        $this->Ln(20);
        // Ensure table header is printed
        parent::Header();
    }
    }
    
    // Connect to database
    $link = mysqli_connect ("192.168.1.14","root","erara6e4","proyecto",3306);
    
    $pdf = new CONSULTAS4();
    $pdf->AddPage();
    // First table: output all columns
    $pdf->Table($link,'SELECT codigo, nombres, apellidos from empleado where codigo in(select cod_emp from novedad where fecha_inicial = \'10/03/2020\' and fecha_final = \'21/03/2020\')');
    $pdf->Output();
?>