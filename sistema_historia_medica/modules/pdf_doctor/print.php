<?php
require('../../assets/plugins/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{

    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Medicos/cas',0,0,'C');
    // Salto de línea
    $this->Ln(20);


    $this->Cell(30,10, 'Nombre', 1,0,'C',0);
    $this->Cell(30,10, 'Apellido', 1,0,'C',0);
    $this->Cell(30,10, 'Cedula', 1,0,'C',0);
    $this->Cell(30,10, 'Telefono', 1,0,'C',0);
    $this->Cell(35,10, 'Especialidad', 1,0,'C',0);
    $this->Cell(30,10, 'Ubicacion', 1,1,'C',0);
    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagína') .$this->PageNo().'/{nb}',0,0,'C');
}
}

require_once('../../config/database.php');

$consulta = "SELECT * FROM medico";
$resultado = mysqli_query($mysqli, $consulta);
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while ($row=$resultado->fetch_assoc()) {
    $pdf->Cell(30,9,utf8_decode($row['nombre_doc']), 1,0,'C',0);
    $pdf->Cell(30,9,utf8_decode($row['apellido']), 1,0,'C',0);
    $pdf->Cell(30,9,utf8_decode($row['cedula']), 1,0,'C',0);
    $pdf->Cell(30,9,utf8_decode($row['telefono']), 1,0,'C',0);
    $pdf->Cell(35,9,utf8_decode($row['especialidad']), 1,0,'C',0);
    $pdf->Cell(30,9,utf8_decode($row['ubicacion']), 1,1,'C',0);
}

$pdf->Output();
?>