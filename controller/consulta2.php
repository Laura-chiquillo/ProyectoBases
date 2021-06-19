<?php

date_default_timezone_set('America/Bogota');
require('../model/tabla.php');
$sucur = $_POST['sucu'];

class CONSULTAS2 extends PDF_MySQL_Table{

    function Header()
    {
        // Title
        $this->SetFont('Arial','',12);
        $this->Image('../UB-XYZ.jpg',180,5,-700);
        $this->Ln(10);
        $this->Cell(0,6,'Sueldos Pagados  (SR-Solutions) - empresa UB-XYZ',0,1,'C');
        $this->Cell(40,10,date('Y-m-d H:i:s'),0,1,'L');
        $this->Ln(20);
        // Ensure table header is printed
        parent::Header();
    }
    }
    
    // Connect to database
    $link = mysqli_connect ("192.168.1.14","root","erara6e4","proyecto",3306);
    
    $pdf = new CONSULTAS2();
    $pdf->AddPage();
    // First table: output all columns
    $pdf->Table($link,"SELECT c.id, a.nombres, sum(a.sueldo) from empleado a, sucursal c group by '$sucur'");
    $pdf->Output();
?>