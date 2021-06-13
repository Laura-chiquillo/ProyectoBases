<?php

require('../model/tabla.php');

class CONSULTAS2 extends PDF_MySQL_Table{

    function Header()
    {
        // Title
        $this->SetFont('Arial','',12);
        $this->Image('../UB-XYZ.jpg',180,5,-700);
        $this->Ln(10);
        $this->Cell(0,6,' (SR-Solutions) - empresa UB-XYZ',0,1,'C');
        $this->Ln(20);
        // Ensure table header is printed
        parent::Header();
    }
    }
    
    // Connect to database
    $link = mysqli_connect ("localhost","root","","proyecto",3306);
    
    $pdf = new CONSULTAS2();
    $pdf->AddPage();
    // First table: output all columns
    $pdf->Table($link,'SELECT * from ciudadsucursal');
    $pdf->Output();
?>