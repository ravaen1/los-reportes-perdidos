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
}

?>