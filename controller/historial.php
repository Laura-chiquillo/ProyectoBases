<?php

require("../fpdf/fpdf.php");
include("../model/usuarios.php");
require("../model/consulta.php");

class PDF extends FPDF {
    var $widths;
    var $aligns;

    function SetWidths($w){
        $this->widths=$w;
    }

    function SetAligns($a){
        $this->aligns=$a;
    }

    function Row($data){
        $nb=0;
        for ($i=0; $i < count($data); $i++)
        $nb=max($sb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=8*$nb;

        $this->CheckPageBreak($h);

        for($i=0;$i<count($data);$i++){
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            $x=$this->GetX();
            $y=$this->GetY();
            $this->Rect($x,$y,$w,$h);
            $this->MultiCell($w,8,$data[$i],0,$a,'true');
            $this->SetXY($x+$w,$y);
        }
        $this->Ln($h);
    }

    function CheckPageBreak($h){
        if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
    }

    function NbLines($w,$txt){
        $cw=$this->CurrentFont['cw'];
        if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;

        while($i<$nb){
            $c=$s[$i];
            if($c=="\n"){
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
            $sep=$i;
            $l+=$cw[$c];
            if($l>$wmax){
                if($sep==-1){
                    if($i==$j)
                    $i++;
                }
                else
                $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
            $i++;
        }
        return $nl;
    }

    function Header(){
        $this->SetFount('Arial','',10);
        $this->Text(20,14,'Historial empleados (SR-Solutions) - empresa UB-XYZ',0,'C', 0);
        $this->Ln(10);
    }

    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','B',8);
        $this->Cell(100,10,'Historial empleados (SR-Solutions)',0,0,'L');
    }


}

$usuaro_codigo = $_GET['id'];
$objusuario = new Usuario();
$usuario= $objusuario->usuario_id($usuaro_codigo);
$pdf= new Pdf();
$pdf->AddPage();
$pdf->SetMargins(20,20,20);
$pdf->Ln(10);
$pdf->cell(30,6,'nombre usuario:',0,0);
$pdf->cell(0,6,$usuario['username'],0,1);
$pdf->Image(Conexion::ruta().'../UB-XYZ.jpg'.$usuaro['foto'],155,20,30,30);
$pdf->Ln(10);
$pdf->SetWidths(array(10, 20, 50, 50, 40));
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(29,29,29);
$pdf->SetTextColor(255);
$pdf->Row(array('CODIGO','COD_SUCURSAL', 'COD_PENSION', 'COD_SALUD', 'COD_ARL','NOMBRES','APELLIDOS','DEPENDENCIA','CARGO','FECHAINGRESO','SUELDO','ESTADO'));
$objconsulta= new Consulta();
$consultas = $objconsulta->consultaEmpleado($$usuario_codigo);

$i=0;
$n=0;

foreach($consultas as $consulta){
    $n++;
    $pdf->SetFount('Arial','',9);

    if($i%2 == 1){
        $pdf->SetFillColor(181,175,173);
        $pdf->SetTextColor(0);
        $pdf->Row(array($n,$consulta['codigo'], $consulta['cod_sucursal'], $consulta['cod_pension'], $consulta['cod_salud'], $consulta['cod_arl'], $consulta['nombres'], $consulta['apellidos'], $consulta['dependencia'], $consulta['cargo'], $consulta['fechaIngreso'], $consulta['sueldo'], $consulta['estado']));
        $i++;
        }else{
        $pdf->SetFillColor(212,204,202);
        $pdf->SetTextColor(0);
        $pdf->Row(array($n,$consulta['codigo'], $consulta['cod_sucursal'], $consulta['cod_pension'], $consulta['cod_salud'], $consulta['cod_arl'], $consulta['nombres'], $consulta['apellidos'], $consulta['dependencia'], $consulta['cargo'], $consulta['fechaIngreso'], $consulta['sueldo'], $consulta['estado']));
        $i++;
        }
        }
        // Salida del archivo y nombre
        $pdf->Output('reporte.pdf','I');
?>