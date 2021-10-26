<?php
require('fpdf/fpdf.php');

class PDF extends FPDF {
    
    function Header()
    {
        $this->AddLink();
        $this->Image('img\logotransparente.png',10,10,55,0,'','www.google.com');
        $this->SetFont('Arial','B',18);
        $this->Cell(80);
        $this->SetFont(30,10,'area de perdidas',0,1,'C');
        $this->Cell(80);
        $this->Cell(30,10,'area de perdidas',0,1,'C');
    }

    function Footer()
    {
        $this->SetY(-18);
        $this->SetFont('Arial','I',12);
        $this->AddLink();
        $this->Cell(5,10,'www.electrodunas.com',0,0,'L');
        $this->SetFont('Arial','I',10);
        $this->Cell(0,10,'pagina '.$this->PageNo().' de {nb}',0,0,'C');
        
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B','18');
$pdf->Cell(50,12,'hola mundo',1,1,'C');
$pdf->Output();

?>