<?php
require('../model/tabla.php');

class PDF extends PDF_MySQL_Table{

    function Header()
{
        $this->SetFont('Arial','',12);
        $this->Image('../UB-XYZ.jpg',180,5,-700);
        $this->Ln(10);
        $this->Cell(0,6,'Consulta empleados por ciudad y sucursal (SR-Solutions) - empresa UB-XYZ',0,1,'I');
        $this->Ln(20);
        // Ensure table header is printed
        parent::Header();
}
}

// Connect to database
$link = mysqli_connect ("192.168.1.19","root","erara6e4","proyecto",3306);

$pdf = new PDF();
$pdf->AddPage();
$pdf->charset="UTF-8";
// First table: output all columns
$pdf->Cell(0,6,'Ciudad Cali',0,1,'C');
$pdf->Table($link,'SELECT * from empleado  WHERE cod_Sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadSucursal WHERE descripcion= "Cali"))');
$pdf->Ln(15);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,6,'Ciudad Barranquilla',0,1,'C');
$pdf->Table($link,'SELECT * from empleado  WHERE cod_Sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadSucursal WHERE descripcion= "Barranquilla"))');
$pdf->Ln(15);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,6,'Ciudad Medellín',0,1,'C');
$pdf->Table($link,'SELECT * from empleado  WHERE cod_Sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadSucursal WHERE descripcion= "Medellín"))');
$pdf->Ln(15);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,6,'Ciudad Bogotá',0,1,'C');
$pdf->Table($link,'SELECT * from empleado  WHERE cod_Sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadSucursal WHERE descripcion= "Bogotá"))');
$pdf->Ln(15);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,6,'Ciudad Pereira',0,1,'C');
$pdf->Table($link,'SELECT * from empleado  WHERE cod_Sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadSucursal WHERE descripcion= "Pereira"))');
$pdf->Ln(15);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,6,'Ciudad Armenia',0,1,'C');
$pdf->Table($link,'SELECT * from empleado  WHERE cod_Sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadSucursal WHERE descripcion= "Armenia"))');
$pdf->Ln(15);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,6,'Ciudad Cartagena',0,1,'C');
$pdf->Table($link,'SELECT * from empleado  WHERE cod_Sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadSucursal WHERE descripcion= "Cartagena"))');
$pdf->Ln(15);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,6,'Ciudad Ibagué',0,1,'C');
$pdf->Table($link,'SELECT * from empleado  WHERE cod_Sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadSucursal WHERE descripcion= "Ibagué"))');
$pdf->Ln(15);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,6,'Ciudad Neiva',0,1,'C');
$pdf->Table($link,'SELECT * from empleado  WHERE cod_Sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadSucursal WHERE descripcion= "Neiva"))');
$pdf->Ln(15);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,6,'Ciudad Popayan',0,1,'C');
$pdf->Table($link,'SELECT * from empleado  WHERE cod_Sucursal IN (SELECT id from sucursal WHERE cod_Ciudad in(SELECT id FROM ciudadSucursal WHERE descripcion= "Popayán"))');
$pdf->Output();
?>