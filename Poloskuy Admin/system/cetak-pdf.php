<?php
require_once("tcpdf/tcpdf.php");
if(isset($_GET["id"])){
    $dir = $_GET["id"];
    
}
class PDF extends TCPDF {
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'Logo_Poloskuy.jpeg';
        $this->Image($image_file, 30, 5, 17, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->Ln(2);
        $this->SetFont('helvetica', 'B', 16);
        $this->Cell(180,0,'Laporan Pantauan '.$_GET["jd"],0,1,'C');
        $this->SetFont('helvetica', '', 9);
        $this->Cell(180,5,'Telepon : 081249345670 / Email : muhamadkbar47@gmail.com',0,1,'C');
        $this->SetFont('helvetica', '', 9);
        $this->Cell(180,5,'Jln Nusa Indah IV no . 1 Jember Lor, Patrang, Jember',0,1,'C');
        $this->SetFont('helvetica', '', 9);
        $this->Cell(180,5,''.date('d-m-Y'),0,1,'C');
        

    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$pdf = new PDF('P', 'mm','A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Fikri Azkiai zamzam');
$pdf->SetTitle('Laporan Poloskuy');
$pdf->SetSubject('Laporan Data');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->SetFont('times', '', 12, '', true);

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$pdf->AddPage();

$html = file_get_contents("http://localhost/poloskuy/system/PdfList/$dir");

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('example_001.pdf', 'I');

?>