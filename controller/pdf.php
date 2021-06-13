<?php
require('../model/tabla.php');

class PDF extends PDF_MySQL_Table{

    function Header()
{
        $this->SetFont('Arial','',12);
        $this->Image('../UB-XYZ.jpg',180,5,-700);
        $this->Ln(10);
        $this->Cell(0,6,'Conasulta empleados (SR-Solutions) - empresa UB-XYZ',0,1,'C');
        $this->Ln(20);
        // Ensure table header is printed
        parent::Header();
}
}

// Connect to database
$link = mysqli_connect ("localhost","root","","proyecto",3306);

$pdf = new PDF();
$pdf->AddPage();
// First table: output all columns
$pdf->Table($link,'SELECT * from empleado  WHERE cod_sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadsucursal WHERE descripcion= "Cali"))');
$pdf->Ln(15);
$pdf->Table($link,'SELECT * from empleado  WHERE cod_sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadsucursal WHERE descripcion= "Barranquilla"))');
$pdf->Ln(15);
$pdf->Table($link,'SELECT * from empleado  WHERE cod_sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadsucursal WHERE descripcion= "Medellín"))');
$pdf->Ln(15);
$pdf->Table($link,'SELECT * from empleado  WHERE cod_sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadsucursal WHERE descripcion= "Bogotá"))');
$pdf->Ln(15);
$pdf->Table($link,'SELECT * from empleado  WHERE cod_sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadsucursal WHERE descripcion= "Pereira"))');
$pdf->Ln(15);
$pdf->Table($link,'SELECT * from empleado  WHERE cod_sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadsucursal WHERE descripcion= "Armenia"))');
$pdf->Ln(15);
$pdf->Table($link,'SELECT * from empleado  WHERE cod_sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadsucursal WHERE descripcion= "Cartagena"))');
$pdf->Ln(15);
$pdf->Table($link,'SELECT * from empleado  WHERE cod_sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadsucursal WHERE descripcion= "Ibagué"))');
$pdf->Ln(15);
$pdf->Table($link,'SELECT * from empleado  WHERE cod_sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadsucursal WHERE descripcion= "Neiva"))');
$pdf->Ln(15);
$pdf->Table($link,'SELECT * from empleado  WHERE cod_sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadsucursal WHERE descripcion= "Popayán"))');
$pdf->Output();
?>