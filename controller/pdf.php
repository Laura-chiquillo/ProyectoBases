<?php
require('../model/tabla.php');

class PDF extends PDF_MySQL_Table{

    function Header()
{
    // Title
    $this->SetFont('Arial','',12);
    $this->Image('../UB-XYZ.jpg',5,5,-800);
    $this->Cell(0,6,'Historial empleados (SR-Solutions) - empresa UB-XYZ',0,1,'C');
    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database
$link = mysqli_connect ("localhost","root","","proyecto",3306);

$pdf = new PDF();
$pdf->AddPage();
// First table: output all columns
$pdf->Table($link,'SELECT * from empleado WHERE codigo');
$pdf->AddPage();
// Second table: specify 3 columns
//$pdf->AddCol('rank',20,'','C');
//$pdf->AddCol('name',40,'Country');
//$pdf->AddCol('pop',40,'Pop (2001)','R');
$prop = array('HeaderColor'=>array(205,100,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>1);
//$pdf->Table($link,'select name, format(pop,0) as pop, rank from country order by rank limit 0,10',$prop);
$pdf->Output();
?>