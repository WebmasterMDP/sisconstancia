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
        $this->Cell(NULL,21,utf8_decode('RESOLUCIÓN DE CONFORMIDAD DE OBRA'),0,0,'C');
        $this->Ln(4);
        $this->Cell(NULL,23,utf8_decode('N° 0007-2023-SOPR-MDCH'),0,0,'C');
        $this->Ln(7);
        $this->SetFont('Arial','B',9);
        $this->Cell(NULL,21,utf8_decode('(LEY 29090)'),0,0,'C');
        /* $this->Ln(3); */
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
/* $pdf->SetTitle(utf8_decode('LICENCIA DE FUNCIONAMIENTO - codLicencia')); */

$pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://192.168.30.13/pdf/public/pdf/_token', 160,5,40, 0, 'PNG');
/* $pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://192.168.30.13/sislicencias/public/licencias/pdf/id, 160,5,40, 0, 'PNG'); */
/* $qr = QrCode::email('foo@bar.com'); */

/* SUBTITULO */
$pdf->SetFont('Arial', 'B',9);
$pdf->Cell(20,15,utf8_decode('Expediente: '),0,0,'L');
$pdf->SetFont('Arial', null,9);
$pdf->Cell(40,15,utf8_decode('2008-2023'),0,0,'L');
$pdf->SetFont('Arial', 'B',9);
$pdf->Cell(35,15,utf8_decode('Fecha de Expedición: '),0,0,'L');
$pdf->SetFont('Arial', null,9);
$pdf->Cell(0,15,utf8_decode('13/03/2023'),0,0,'L');
$pdf->Ln(7);

/* SUBTITULO */
$pdf->SetFont('Arial', null,9);
$pdf->Cell(1,15,utf8_decode('La Subgerencia de Obras Privadas y Control Urbano,'),0,0,'L');
$pdf->Ln(7);
$pdf->Cell(1,15,utf8_decode('Certifica:'),0,0,'L');
$pdf->Ln(12);

/* PARRAFO */
$pdf->SetFont('Arial', null,10);
$pdf->Write(5, utf8_decode('Que de conformidad con la Inspección Ocular realizado por el Personal Técnico de la Subgerencia de Obras Privadas y Control Urbano al predio de'));
/* $pdf->MultiCell(0, 4, utf8_decode('Que de conformidad con la Inspección Ocular realizado por el Personal Técnico de la Subgerencia de Obras Privadas y Control Urbano al predio de') ,0 ,'J', false); */
$pdf->SetFont('Arial', 'B',10);
$pdf->Write(5, utf8_decode(' MARIA DEL ROSARIO HONDERMANN '));
$pdf->SetFont('Arial', null,10);
$pdf->Write(5, utf8_decode('Ubicado en '));
$pdf->SetFont('Arial', 'B',10);
$pdf->Write(5, utf8_decode('JIRON MANUEL LECCA N°200-206, ESQ. PASAJE EL DESCANSO, ESQ. JR. SANTA RITA N°203-209-215, BARRIO ALTO PERU. '));
$pdf->SetFont('Arial', null,10);
$pdf->Write(5, utf8_decode('de este distrito se encuentra concluida de Conformidad a:'));
$pdf->Ln(8);

$pdf->Cell(63, 5, utf8_decode('N° de Licencia: '), 1, 0, 'L', 0);
$pdf->Cell(63, 5, utf8_decode('N° de Expediente: '), 1, 0, 'L', 0);
$pdf->Cell(63, 5, utf8_decode('Monto: '), 1, 0, 'L', 0);
$pdf->Ln(4);

/* DATOS */
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Tipo de edificación '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(50,15,utf8_decode(': VIVIENDA MULTIFAMILIAR'),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Área Terreno '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(15,15,utf8_decode(': 336.90 m²'),0,0,'L');
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Área Construida '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(50,15,utf8_decode(': 1,010.33 m²'),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Otros '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(15,15,utf8_decode(': -'),0,0,'L');
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Valor de la Obra '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(15,15,utf8_decode(': S/ 879,734.74'),0,0,'L');
$pdf->Ln(12);

/* $pdf->SetFont('Arial', null,8);
$pdf->Cell(34,3,utf8_decode('DIRECCIÓN DE'),0,0,'L');$pdf->Ln(4);
$pdf->Cell(34,3,utf8_decode('ESTABLECIMIENTO'),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
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
 */
$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(20, 5, utf8_decode(''), 0, 0, 'C', 0);
$pdf->Cell(27, 5, utf8_decode('ZONIFICACIÓN'), 1, 0, 'C', 0);
$pdf->Cell(18, 5, utf8_decode('AREA E:U. '), 1, 0, 'C', 0);
$pdf->Cell(35, 5, utf8_decode('ALTURA EDIFICACION'), 1, 0, 'C', 0);
$pdf->Cell(18, 5, utf8_decode('RETIRO'), 1, 0, 'C', 0);
$pdf->Cell(22, 5, utf8_decode('AREA LIBRE'), 1, 0, 'C', 0);
$pdf->Cell(19, 5, utf8_decode('DENSIDAD'), 1, 0, 'C', 0);
$pdf->Cell(31, 5, utf8_decode('ESTACIONAMIENTO'), 1, 1, 'C', 0);

$pdf->Cell(20, 5, utf8_decode('NORMATIVA'), 1, 0, 'C', 0);
$pdf->SetFont('Arial', '',6);
$pdf->Cell(27, 5, utf8_decode('RDM'), 1, 0, 'C', 0);
$pdf->Cell(18, 5, utf8_decode('II'), 1, 0, 'C', 0);
$pdf->Cell(35, 5, utf8_decode('8.20M'), 1, 0, 'C', 0);
$pdf->Cell(18, 5, utf8_decode('0.00ML'), 1, 0, 'C', 0);
$pdf->Cell(22, 5, utf8_decode('25%'), 1, 0, 'C', 0);
$pdf->Cell(19, 5, utf8_decode('1300Hab/HA'), 1, 0, 'C', 0);
$pdf->Cell(31, 5, utf8_decode('1 Estc. C/1.5 VIVIENDA'), 1, 1, 'C', 0);

$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(20, 5, utf8_decode('PROYECTO'), 1, 0, 'C', 0);
$pdf->SetFont('Arial', '',6);
$pdf->Cell(27, 5, utf8_decode('RDM'), 1, 0, 'C', 0);
$pdf->Cell(18, 5, utf8_decode('II'), 1, 0, 'C', 0);
$pdf->Cell(35, 5, utf8_decode('7.83M'), 1, 0, 'C', 0);
$pdf->Cell(18, 5, utf8_decode('0.00ML'), 1, 0, 'C', 0);
$pdf->Cell(22, 5, utf8_decode('24%'), 1, 0, 'C', 0);
$pdf->Cell(19, 5, utf8_decode('890Hab/Ha'), 1, 0, 'C', 0);
$pdf->Cell(31, 5, utf8_decode('7 Estacionaminetos'), 1, 1, 'C', 0);

$pdf->Ln(4);

$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(12, 7, utf8_decode('PISO N°'), 1, 0, 'C', 0);
$pdf->Cell(16, 7, utf8_decode('ANTIGUEDAD'), 1, 0, 'C', 0);
$pdf->Cell(22, 7, utf8_decode('MURO Y COLUMNA'), 1, 0, 'C', 0);
$pdf->Cell(12, 7, utf8_decode('TECHOS'), 1, 0, 'C', 0);
$pdf->Cell(9, 7, utf8_decode('PISO'), 1, 0, 'C', 0);
$pdf->Cell(27, 7, utf8_decode('PUERTAS Y VENTANAS'), 1, 0, 'C', 0);
$pdf->Cell(19, 7, utf8_decode('REVISTIMIENTO'), 1, 0, 'C', 0);
$pdf->Cell(9, 7, utf8_decode('BAÑO'), 1, 0, 'C', 0);
$pdf->Cell(37, 7, utf8_decode('INSTALACIONES ELECT. Y SANT.'), 1, 0, 'C', 0);
$pdf->Cell(27, 7, utf8_decode('AREA CONSTRUIDA M2'), 1, 1, 'C', 0);

$pdf->SetFont('Arial', '',6);
$pdf->Cell(12, 7, utf8_decode('1 PISO'), 1, 0, 'C', 0);
$pdf->Cell(16, 7, utf8_decode('2023'), 1, 0, 'C', 0);
$pdf->Cell(22, 7, utf8_decode('C'), 1, 0, 'C', 0);
$pdf->Cell(12, 7, utf8_decode('C'), 1, 0, 'C', 0);
$pdf->Cell(9, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(27, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(19, 7, utf8_decode('F'), 1, 0, 'C', 0);
$pdf->Cell(9, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(37, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(27, 7, utf8_decode('334.80'), 1, 1, 'C', 0);

$pdf->Cell(12, 7, utf8_decode('2 PISO'), 1, 0, 'C', 0);
$pdf->Cell(16, 7, utf8_decode('2023'), 1, 0, 'C', 0);
$pdf->Cell(22, 7, utf8_decode('C'), 1, 0, 'C', 0);
$pdf->Cell(12, 7, utf8_decode('C'), 1, 0, 'C', 0);
$pdf->Cell(9, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(27, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(19, 7, utf8_decode('F'), 1, 0, 'C', 0);
$pdf->Cell(9, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(37, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(27, 7, utf8_decode('260.46'), 1, 1, 'C', 0);

$pdf->Cell(12, 7, utf8_decode('3 PISO'), 1, 0, 'C', 0);
$pdf->Cell(16, 7, utf8_decode('2023'), 1, 0, 'C', 0);
$pdf->Cell(22, 7, utf8_decode('C'), 1, 0, 'C', 0);
$pdf->Cell(12, 7, utf8_decode('C'), 1, 0, 'C', 0);
$pdf->Cell(9, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(27, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(19, 7, utf8_decode('F'), 1, 0, 'C', 0);
$pdf->Cell(9, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(37, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(27, 7, utf8_decode('260.46'), 1, 1, 'C', 0);

$pdf->Cell(12, 7, utf8_decode('4 PISO'), 1, 0, 'C', 0);
$pdf->Cell(16, 7, utf8_decode('2023'), 1, 0, 'C', 0);
$pdf->Cell(22, 7, utf8_decode('C'), 1, 0, 'C', 0);
$pdf->Cell(12, 7, utf8_decode('C'), 1, 0, 'C', 0);
$pdf->Cell(9, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(27, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(19, 7, utf8_decode('F'), 1, 0, 'C', 0);
$pdf->Cell(9, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(37, 7, utf8_decode('D'), 1, 0, 'C', 0);
$pdf->Cell(27, 7, utf8_decode('154.61'), 1, 1, 'C', 0);

$pdf->Ln(4);

/* SEGUNDO PARRAFO */
$pdf->SetFont('Arial', null,9);
$pdf->MultiCell(0, 4, utf8_decode('Se expide esta Resolución de acuerdo al D.S. 006-2017-VIV, Ley 29090 y modificatorias.') ,0 ,'J', false);

/* SEGUNDO SUBTITULO */
$pdf->SetFont('Arial', 'UB', 9);
$pdf->Cell(0,15,utf8_decode('OBSERVACIONES:'),0,0,'L');
$pdf->Ln(15);

/* 
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
$pdf->Ln(15); */

$pdf->Output();
exit;
?>
