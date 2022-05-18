<?php

session_start();
require_once('./include/loginfo.php');
require('./include/fpdf/fpdf.php');
$conexion = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conexion, 'phpbot');

class PDF extends FPDF
{
function Header()
{    $this->SetMargins(35, 25, 30);
	$this->Image('./assets/images/logotipo_ugc.png', 10,10,30);
	$this->SetFont('Arial','B',20);
	$this->Cell(50,10);
	$this->Cell(0,10,'Reporte de Mensajes respondidas');
	$this->Ln(15);
	$this->SetFont('Arial','B',10);
	$this->Cell(120,10);
    $this->Cell(50,10,'Fecha de reporte: '.date('d-m-Y').'', 0, 'R');
	//$this->Cell(50, 10, 'Generado: '.date('d-m-Y').'', 0, 'R');
	$this->Ln(10);

	// Colores de los bordes, fondo y texto
    $this->SetDrawColor(222,227,221);
     $this->SetFillColor(200,220,255);
   // $this->SetTextColor(220,50,50);
    // Ancho del borde (1 mm)
   // $this->SetLineWidth(1);

    
	$this->Cell(10, 8, 'ID' ,1,0,'C' );
	$this->Cell(40, 8, 'Correo' ,1,0,'C');
    $this->Cell(40, 8, 'Asunto' ,1,0,'C');
	$this->Cell(60, 8, 'Mensaje' ,1,0,'C');

	$this->Ln(8);
}
function Footer()
{
	// Posición: a 1,5 cm del final
	$this->SetY(-15);
	$this->SetFont('Arial','I',8);
	$this->Cell(0,10,'Pagina '.$this->PageNo().' / {nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
//$pdf = new PDF();
$pdf = new PDF('P','mm','legal'); //Tamaño en forma Horizontal
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf = new FPDF('L','mm','legal'); //Tamaño en forma Horizontal
//$pdf = new FPDF('P','mm','letter'); //Tamaño Normal
//$pdf->AddPage();
//$title = 'Reporte de Usuarios';
//$pdf->SetTitle($title);
//$pdf->SetFont('Arial', '', 10);
$start_x=$pdf->GetX(); //initial x (start of column position)
$current_y = $pdf->GetY();
$current_x = $pdf->GetX();

$cell_width = 20;  //define cell width
$cell_height=7;    //define cell height

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$noSolucion = mysqli_query($conexion,"SELECT * FROM answer");
$item = 0;

while($usuarios = mysqli_fetch_array($noSolucion)){
    $cuerpo = $usuarios['mensaje'];
    $cuerpodeco = utf8_decode($cuerpo);

	$asunto = $usuarios['asunto'];
    $asuntodeco = utf8_decode($cuerpo);

	$item = $item+1;
    $pdf->Cell(10, 8, $item, 0);
	$pdf->Cell(40, 8, $usuarios['correo'], 0);
	$pdf->Cell(50, 8, $asunto, 0);
	$pdf->Multicell(0, 3, $cuerpodeco, 0);
	$pdf->Ln(8);
    
        

    
}
$pdf->Ln(8);

//$pdf->Cell(0, 10, 'Pagina: '.$pdf->PageNo(),0,0,'C');
//$pdf->Output('UGC_reportes.pdf','D'); Descargar el archivo
$pdf->Output(); //Ver en linea el documento
?>