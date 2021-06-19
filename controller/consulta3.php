<?php
date_default_timezone_set('America/Bogota');
require('../model/tabla.php');
$nombe = $_POST['descue'];


class CONSULTAS3 extends PDF_MySQL_Table{

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
    
    $pdf = new CONSULTAS3();
    $pdf->AddPage();
    // First table: output all columns
    $pdf->Table($link,"SELECT codigo,  nombres ,sueldo, (4*sueldo)/100 from empleado where $nombe");
    $pdf->Output();
?>