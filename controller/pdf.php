<?php

date_default_timezone_set('America/Bogota');
require('../model/tabla.php');
$ciudad = $_POST['ciudad'];

class PDF extends PDF_MySQL_Table{

    function Header()
{
        $this->SetFont('Arial','',12);
        $this->Image('../UB-XYZ.jpg',180,5,-700);
        $this->Ln(10);
        $this->Cell(0,6,'Consulta empleados por ciudad y sucursal (SR-Solutions) - empresa UB-XYZ',0,1,'I');
        $this->Cell(40,10,date('Y-m-d H:i:s'),0,1,'L');
        $this->Ln(20);
        // Ensure table header is printed
        parent::Header();
}
}

// Connect to database
$link = mysqli_connect ("192.168.1.14","root","erara6e4","proyecto",3306);

$pdf = new PDF();
$pdf->AddPage();
$pdf->charset="UTF-8";
// First table: output all columns

$pdf->Table($link,"SELECT * from empleado  WHERE cod_Sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadSucursal WHERE descripcion = '$ciudad'));
");

$pdf->Output();
?>