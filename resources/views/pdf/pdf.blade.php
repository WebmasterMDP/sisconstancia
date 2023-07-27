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
        
        // Arial bold 15
        $this->SetFont('Arial',null,16);
        // Movernos a la derecha
        $this->Cell(35);
        // Título
        
        $this->Ln(7);
        $this->Cell(35);
        $this->SetFont('Arial','B',21);
        
        $this->Ln(20);
        $this->Cell(35);
        $this->SetFont('Arial',null,9);
        
        // Salto de línea
        $this->Ln(10);
    }

    /* function Header()
    {
        // Logo
        $this->Image('vendor/adminlte/dist/img/escudo.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial',null,16);
        // Movernos a la derecha
        $this->Cell(35);
        // Título
        $this->Cell(25,15,'MUNICIPALIDAD DE',0,0,'L');
        $this->Ln(7);
        $this->Cell(35);
        $this->SetFont('Arial','B',21);
        $this->Cell(25,15,'PACHACAMAC',0,0,'L');
        $this->Ln(7);
        $this->Cell(35);
        $this->SetFont('Arial',null,9);
        $this->Cell(25,13,utf8_decode('GERENCIA DE LICENCIAS, DESARROLLO ECONÓMICO Y TURISMO'),0,0,'L');
        // Salto de línea
        $this->Ln(10);
    } */

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
$pdf->SetTitle(utf8_decode('LICENCIA DE FUNCIONAMIENTO - codLicencia'));

$pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://192.168.30.13/pdf/public/pdf/_token', 160,5,40, 0, 'PNG');
/* $pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://192.168.30.13/sislicencias/public/licencias/pdf/id, 160,5,40, 0, 'PNG'); */
/* $qr = QrCode::email('foo@bar.com'); */

/* TITULO */
$pdf->SetMargins(left:28, top:20);
$pdf->Ln(1);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,15,utf8_decode('CERTIFICADO DE AUTORIZACIÓN'),0,0,'C');
$pdf->Ln(5);
$pdf->Cell(0,15,utf8_decode('DE LICENCIA DE FUNCIONAMIENTO N° codLicencia'),0,0,'C');
$pdf->Ln(10);
/* SUBTITULO */
$pdf->SetFont('Arial', 'B',9);
$pdf->Cell(0,15,utf8_decode('EXPEDIENTE Nº expediente'),0,0,'L');
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B',9);
$pdf->Cell(0,15,utf8_decode('RESOLUCIÓN DE GERENCIA Nº resolucion'),0,0,'L');
$pdf->Ln(12);

/* PARRAFO */
$pdf->SetFont('Arial', null,9);
$pdf->MultiCell(0, 4, utf8_decode('Habiamos cumplido con presentar los requisitos establecidos y con la evaluación técnica señalados en el Texto Unico Ordenado de la Ley Nº 28976, Ley Marco de Licencias de Funcionamiento compilados en el Texto Unico de Procedimientos Administrativos - TUPA de esta corporación Edil, así como las Normas vigentes de la materia, habiendo realizado el procedimiento de:') ,0 ,'J', false);
$pdf->Ln(1);

/* SEGUNDO TITULO */
$pdf->SetFont('Arial', 'B',14);
$pdf->Cell(0,15,utf8_decode('Licencia de Funcionamiento Indeterminada'),0,0,'C');
$pdf->Ln(11);

/* DATOS */
$pdf->SetFont('Arial', null,8);
$pdf->Cell(34,15,utf8_decode('OTORGADO A '),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(15,15,utf8_decode(':apeNombre'),0,0,'L');
$pdf->Ln(4);

$pdf->SetFont('Arial', null,8);
$pdf->Cell(34,15,utf8_decode('R.U.C.'),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(15,15,utf8_decode(':ruc'),0,0,'L');
$pdf->Ln(10);

$pdf->SetFont('Arial', null,8);
$pdf->Cell(34,3,utf8_decode('DIRECCIÓN DE'),0,0,'L');$pdf->Ln(4);
$pdf->Cell(34,3,utf8_decode('ESTABLECIMIENTO'),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
/* $pdf->MultiCell(0, 3, utf8_decode(':dirEstable.' N° numero.'  INT. int.'  MZ. manzana.'  LT. lote.'  SECTOR sector) ,0 ,'L', false); */
$pdf->Cell(15,3,utf8_decode(':dirEstable. N° numero.  INT. int.  MZ. manzana.  LT. lote'),0,10,'L');
$pdf->Cell(15,3,utf8_decode(' SECTOR  sector'),0,10,'L');

$pdf->Ln(1);
$pdf->SetFont('Arial', null,8);
$pdf->Cell(1,-3,utf8_decode('COMERCIAL'),0,0,'L');
$pdf->Ln(1);

$pdf->SetFont('Arial', null,8);
$pdf->Cell(34,3,utf8_decode('DISTRITO '),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(15,3,utf8_decode(':PACHACAMAC'),0,0,'L');
$pdf->Ln(4);

$pdf->SetFont('Arial', null,8);
$pdf->Cell(34,3,utf8_decode('GIRO(S) '),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->MultiCell(0, 4, utf8_decode(':giroEstable') ,0 ,'L', false);
$pdf->Ln(0.5);

$pdf->SetFont('Arial', null,8);
$pdf->Cell(34,3,utf8_decode('ÁREA '),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(15,3,utf8_decode(':area. m²'),0,0,'L');
$pdf->Ln(4);

$pdf->SetFont('Arial', null,8);
$pdf->Cell(34,3,utf8_decode('ZONIFICACIÓN '),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(15,3,utf8_decode(':zonificacion'),0,0,'L');
$pdf->Ln(4);

$pdf->SetFont('Arial', null,8);
$pdf->Cell(34,3,utf8_decode('HORARIO DE ATENCIÓN '),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(15,3,utf8_decode(':07:00 horas a 23:00 horas'),0,0,'L');
$pdf->Ln(4);

$pdf->SetFont('Arial', null,8);
$pdf->Cell(34,3,utf8_decode('VIGENCIA DE LICENCIA '),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(15,3,utf8_decode(':vigencia'),0,0,'L');
$pdf->Ln(15);

/* SEGUNDO PARRAFO */
$pdf->SetFont('Arial', null,9);
$pdf->MultiCell(0, 4, utf8_decode('La Municipalidad está facultada para realizar labores de fiscalización de las actividade económicas autorizadas con el fin de verificar el cumplimiento de las obligaciones de los titulares de las licencias de funcionamiento.') ,0 ,'J', false);

/* SEGUNDO SUBTITULO */
$pdf->SetFont('Arial', 'UB', 9);
$pdf->Cell(0,15,utf8_decode('OBSERVACIONES:'),0,0,'L');
$pdf->Ln(15);

$pdf->SetFont('Arial', null, 9);
$pdf->MultiCellBlt(154, 4, '-', utf8_decode('El establecimiento no debe ser objeto de queja de vecinos fundadas, bajo paercimiento de aplicarse las sanciones correspondientes y la revocatoria de la Licencia.'));
$pdf->MultiCellBlt(154, 4, '-', utf8_decode('No se autoriza el uso de la vía pública ni el uso del retiro municipal con fines comerciales, bajo apercimiento de imponerse las sanciones correspondientes.'));
$pdf->MultiCellBlt(154, 4, '-', utf8_decode('Se previlegian los principios de presunción de veracidad y de control posterior  contenidas en el T.U.O de la LPAG.'));
$pdf->Ln(5);

$pdf->SetFont('Arial', null, 9);
$pdf->Cell(0,0,utf8_decode('Al ciere definitivo, tramitar el cese de la actividad económica.'),0,0,'L');
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 9);
setlocale(LC_TIME, "spanish");
$fecha = str_replace("/", "-", 'fechaExped'); 
$newDate = utf8_decode(date("d-m-Y", strtotime('fechaExped'))); 
$mesDesc = utf8_decode(strftime("%d de %B %Y.", strtotime($newDate))) ;
$pdf->Cell(0,0,utf8_decode('PACHACAMAC, '.$mesDesc),0,0,'L');
$pdf->Ln(15);

$pdf->Output();
exit;
?>
