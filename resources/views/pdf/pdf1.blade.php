<?php

use Codedge\Fpdf\Fpdf\Fpdf;
use Codedge\Fpdf\Fpdf\MultiCellBlt;
/* use League\CommonMark\Extension\CommonMark\Node\Inline\Strong; */
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use App\Models\Licencia;
/* use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer; */

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        /* $this->Image('vendor/adminlte/dist/img/escudo.png',10,8,33); */
        // Arial bold 15
        $this->SetFont('Arial','B',12);
        // Movernos a la derecha
        $this->Cell(1);
        // Título
        $this->Cell(NULL,15,'MUNICIPALIDAD DISTRITAL DE PACHACAMAC',0,0,'C');
        $this->Ln(4);
        $this->SetFont('Arial','B',10);
        $this->Cell(NULL,17,'GERENCIA DE DESARROLLO URBANO',0,0,'C');
        $this->Ln(3);
        $this->Cell(NULL,19,'SUBGERENCIA DE OBRAS PRIVADAS Y CONTROL URBANO',0,0,'C');
        $this->Ln(6);
        $this->SetFont('Arial','B',14);
        $this->Cell(NULL,21,utf8_decode('RESOLUCIÓN DE LICENCIA DE EDIFICACIÓN'),0,0,'C');
        $this->Ln(4);
        $this->Cell(NULL,23,utf8_decode('N° 0007-2023'),0,0,'C');
        $this->Ln(20);
    }
        function LoadData($file)
    {
        // Leer las líneas del fichero
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }

    // Tabla simple
    function BasicTable($header, $data)
    {
        // Cabecera
        foreach($header as $col)
            $this->Cell(40,7,$col,1);
        $this->Ln();
        // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(40,6,$col,1);
            $this->Ln();
        }
    }

    // Una tabla más completa
    function ImprovedTable($header, $data)
    {
        // Anchuras de las columnas
        $w = array(40, 35, 45, 40);
        // Cabeceras
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C');
        $this->Ln();
        // Datos
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$row[0],'LR');
            $this->Cell($w[1],6,$row[1],'LR');
            $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
            $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
            $this->Ln();
        }
        // Línea de cierre
        $this->Cell(array_sum($w),0,'','T');
    }

    function MultiCellBlt($w, $h, $blt, $txt, $border=0, $align='J', $fill=false)
    {
        //Get bullet width including margins
        $blt_width = $this->GetStringWidth($blt)+$this->cMargin*2;

        //Save x
        $bak_x = $this->x;

        //Output bullet
        $this->Cell($blt_width,$h,$blt,0,'',$fill);

        //Output text
        $this->MultiCell($w-$blt_width,$h,$txt,$border,$align,$fill);

        //Restore x
        $this->x = $bak_x;
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-20);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('ESTE CERTIFICADO DEBE EXHIBIRSE OBLIGATORIAMENTE EN UN LUGAR VISIBLE'),0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage( 'P' ,  'A4'); /* VERTICAL */
/* $pdf->AddPage( 'L' ,  'A4'); HORIZONTAL */

$pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://192.168.30.13/pdf/public/pdf/_token', 160,5,40, 0, 'PNG');


/* SUBTITULO */
$pdf->SetFont('Arial', 'B',9);
$pdf->Cell(35,15,utf8_decode('Fecha de Expedición: '),0,0,'L');
$pdf->SetFont('Arial', null,9);
$pdf->Cell(40,15,utf8_decode('20/01/2023'),0,0,'L');

$pdf->SetFont('Arial', 'B',9);
$pdf->Cell(35,15,utf8_decode('Fecha de Caducidad: '),0,0,'L');
$pdf->SetFont('Arial', null,9);
$pdf->Cell(40,15,utf8_decode('20/01/2026'),0,0,'L');

$pdf->SetFont('Arial', 'B',9);
$pdf->Cell(20,15,utf8_decode('Expediente: '),0,0,'L');
$pdf->SetFont('Arial', null,9);
$pdf->Cell(40,15,utf8_decode('0197-2023'),0,0,'L');
$pdf->Ln(12);


$pdf->Write(5, utf8_decode('Vistos los Dictámenes favorables de las Comisiones Técnicas, Revisores Urbanos y Evaluación Municipal con la APROBACIÓN correspondiente y cumplidos los requisitos administrativos más los pagos pertinentes, se concede:'));
$pdf->Ln(2);

/* DATOS */
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(40,15,utf8_decode('Licencia de '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(50,15,utf8_decode(': OBRA NUEVA'),0,0,'L');
$pdf->Ln(8);

$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(40,15,utf8_decode('Tipo de edificación '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(90,15,utf8_decode(': VIVIENDA MULTIFAMILIAR'),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(40,15,utf8_decode('MODALIDAD '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(15,15,utf8_decode(': "C"'),0,0,'L');
$pdf->Ln(8);

$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(40,15,utf8_decode('Zonificación '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(90,15,utf8_decode(': RDM'),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(40,15,utf8_decode('Área de Estruct. Urbana '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(15,15,utf8_decode(': II'),0,0,'L');
$pdf->Ln(8);

$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(40,15,utf8_decode('Ubicación '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(50,15,utf8_decode(': AV. LAS GAVIOTAS N°436-444-440, MZ. A SUB LOTE 18-B'),0,0,'L');
$pdf->Ln(8);

$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(40,15,utf8_decode('Propietario '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(50,15,utf8_decode(': PROYECTOS CONSTRUCTIVOS STELLA S.A.C.'),0,0,'L');
$pdf->Ln(8);

$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(40,15,utf8_decode('Área Total de Construcción '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(15,15,utf8_decode(': 7,851.48 m²'),0,0,'L');
$pdf->Ln(8);

/* SEGUNDO PARRAFO PISOS */
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('1° Piso :'),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(50,15,utf8_decode(' 724.14 m²'),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Altura: '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(15,15,utf8_decode(' 26.50 ml'),0,0,'L');
$pdf->Ln(6);

$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('2° Piso :'),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(50,15,utf8_decode(' 680.53 m²'),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Número de Pisos :'),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(15,15,utf8_decode(' 10 pisos + Sotano'),0,0,'L');
$pdf->Ln(6);

$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('3° Piso :'),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(50,15,utf8_decode(' 680.53 m²'),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Cerco :'),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(15,15,utf8_decode(' -----'),0,0,'L');
$pdf->Ln(6);

$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('4° Piso :'),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(50,15,utf8_decode(' 680.53 m²'),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Área del Terreno :'),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(15,15,utf8_decode(' 1,250.20'),0,0,'L');
$pdf->Ln(12);

/* 
$pdf->SetFont('Arial', null,8);
$pdf->Cell(34,3,utf8_decode('VIGENCIA DE LICENCIA '),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(15,3,utf8_decode(':vigencia'),0,0,'L');
$pdf->Ln(15);
 */

$pdf->Ln(4);

/* SEGUNDO PARRAFO */
$pdf->SetFont('Arial', null,9);
$pdf->MultiCell(0, 4, utf8_decode('Se expide esta Resolución de acuerdo al D.S. 006-2017-VIV, Ley 29090 y modificatorias.') ,0 ,'J', false);

/* SEGUNDO SUBTITULO */
$pdf->SetFont('Arial', 'UB', 9);
$pdf->Cell(0,15,utf8_decode('OBSERVACIONES:'),0,0,'L');
$pdf->Ln(15);

$pdf->Output();
exit;
?>
