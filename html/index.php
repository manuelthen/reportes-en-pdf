<?php
require('/var/www/html/fpdf/fpdf.php');
include("db.php");

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(190, 10, 'Reporte de Ventas', 0, 1, 'C');
        $this->Ln(5);
    }
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(40, 10, 'Cliente', 1);
$pdf->Cell(60, 10, 'Producto', 1);
$pdf->Cell(20, 10, 'Cantidad', 1);
$pdf->Cell(30, 10, 'Precio', 1);
$pdf->Cell(40, 10, 'Fecha', 1);
$pdf->Ln();

$result = $conexion->query("SELECT * FROM ventas");
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(40, 10, $row['cliente'], 1);
    $pdf->Cell(60, 10, $row['producto'], 1);
    $pdf->Cell(20, 10, $row['cantidad'], 1);
    $pdf->Cell(30, 10, $row['precio'], 1);
    $pdf->Cell(40, 10, $row['fecha'], 1);
    $pdf->Ln();
}

$pdf->Output();
?>