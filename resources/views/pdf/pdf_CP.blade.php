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
    var $angle=0;

    function Rotate($angle, $x=-1, $y=-1){
        if($x==-1)
            $x=$this->x;
        if($y==-1)
            $y=$this->y;
        if($this->angle!=0)
            $this->_out('Q');
        $this->angle=$angle;
        if($angle!=0){
            $angle*=M_PI/180;
            $c=cos($angle);
            $s=sin($angle);
            $cx=$x*$this->k;
            $cy=($this->h-$y)*$this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
        }
    }

    function Header()
    {
        // Logo
        /* $this->Image('vendor/adminlte/dist/img/escudo.png',77,14,10); */
        // Arial bold 15
        $this->SetFont('Arial','B',6);
        // Movernos a la derecha
        $this->Cell(1);
        // Título

        $this->Image('vendor/adminlte/dist/img/escudo.png',10,8,20);

        $this->SetFont('Arial',null,16);

        $this->Cell(20);

        $this->Cell(15,7,'MUNICIPALIDAD DE',0,0,'L');
        $this->Ln(3);
        $this->SetFont('Arial','B',11);
        $this->Cell(240,0,utf8_decode('SUB GERENCIA DE PLANEAMIENTO'),0,0,'C');
        $this->Ln(1);
        $this->Cell(240,7,utf8_decode('URBANO, CATASTRO, OBRAS PRIVADAS'),0,0,'C');
        $this->Ln(1);
        $this->Cell(240,14,utf8_decode('Y HABILITACIONES URBANAS'),0,0,'C');
        $this->Ln(1);
        $this->Cell(20);
        $this->SetFont('Arial','B',21);
        $this->Cell(25,7,utf8_decode('PACHACÁMAC'),0,0,'L');
        $this->Ln(6);
        
        $this->Ln(6);
        $this->Cell(7);
        $this->SetFont('Arial',null,10);
        $this->Cell(25,7,utf8_decode('"Año de la Unidad, la Paz y el Desarrollo"'),0,0,'L');
        $this->Ln(7);
    
        $this->setFont('Arial','B',50);
        $this->setTextColor(230,210,210);
        $this->RotatedText(45, 248,'S I N   V A L O R   O F I C I A L',60);
    }

    function RotatedText($x, $y, $text, $angle){
        //Text rotated around its origin
        $this->Rotate($angle,$x,$y);
        $this->Text($x,$y,$text);
        $this->Rotate(0);
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

        $this->Image('vendor/adminlte/dist/img/footer.png',10,247,190);
        // Posición: a 1,5 cm del final
        $this->SetY(-20);
        // Arial italic 8
        $this->SetFont('Arial','IU',8);
        // Número de página
        $this->Cell(0, 1, utf8_decode('                                                                                                              '),0,0,'C');
        $this->Ln(3);
        $this->SetFont('Arial','I',8);
        $this->Cell(0, 1, utf8_decode('Sello y Firma del Funcionario Municipal que Otorga la Licencia'),0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage( 'P' ,  'A4'); /* VERTICAL */
/* $pdf->AddPage( 'L' ,  'A4'); HORIZONTAL */

setlocale(LC_TIME, "spanish");
$expediente = utf8_decode(date("d-m-Y", strtotime($showData->fechaExpediente)));
$fechaExpediente = utf8_decode(strftime("%d de %B %Y", strtotime($expediente)));

$pdf->SetMargins(27 , 0);
$pdf->Cell(21);

$pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=https://catastro.munipachacamac.gob.pe/ConstanciaPosesion/'.$showData->_token, 170,5,30, 0, 'PNG');

/* PARRAFO */
$pdf->Ln(6);
$pdf->SetFont('Arial', 'B',12);
$pdf->MultiCell(0,3,utf8_decode('CONSTANCIA DE POSESIÓN'),0,'C',false);
$pdf->Ln(3);
$pdf->SetFont('Arial', 'B',12);
$pdf->MultiCell(0,3,utf8_decode('PARA SERVICIOS BÁSICOS'),0,'C',false);
$pdf->Ln(6);
$pdf->SetFont('Arial', 'BU',15);
$pdf->MultiCell(0,3,utf8_decode('N° '.$showData->codConstancia.'-MDP/GDU/SGPUCOPHU'),0,'C',false);

/* DATOS */
$pdf->SetFont('Arial', 'B',9);
$pdf->Ln(7);
$pdf->Cell(0,5,utf8_decode('Expediente: N° '.$showData->numExpediente),0,0,'R');
$pdf->Ln(5);
$pdf->Cell(0,5,utf8_decode('Fecha Expediente: '.$fechaExpediente),0,0,'R');
$pdf->Ln(7);
$pdf->SetFont('Arial', null,9);
$pdf->MultiCell(0,5,utf8_decode('La Subgerencia de Planeamiento Urbano, Catastro, Obras Privadas y Habilitaciones Urbanas de la Gerencia de Desarrollo Urbano de la Municipalidad Distrital de Pachacamac, hace constar:'),0,'J',false);
$pdf->Ln(6);
$pdf->MultiCell(0,5,utf8_decode('Que, el/la Sr(a) '.$showData->nombreCompleto.', identificado con DNI N° '.$showData->numdoc.', ejerce posesión en forma pacífica, pública, permanente y continua sobre el lote de '.$showData->areaPredio.' m², el cual se encuentra ubicado en el lote xx Mz xx de la Asociación de Vivienda '.$showData->ubicacion.', en el distrito de Pachacamac, de la provincia y departamento de Lima, con las siguientes medidas perimétricas:'),0,'J',false);
$pdf->Ln(6);
$pdf->MultiCell(0,5,utf8_decode('Que, en merito a lo señalado en el INFORME TECNICO N° '.$showData->numInforme.'-2023/MDP- GDU-SGPUCOPHU-TC, de '.$showData->fechaInforme.', conteniendo el resultado de inspección ocular solicitado por el administrado para el otorgamiento de Constancia para los Servicios Básicos.'),0,'J',false);
$pdf->Ln(6);
$pdf->MultiCell(0,5,utf8_decode('Que, por tales razones anteriormente expuestas se expide la presente CONSTANCIA DE POSESIÓN, únicamente para solicitar el otorgamiento de los SERVICIOS BASICOS, a que se refiere el Artículo Nº 24 de la Ley Nº 28687 "Ley de Desarrollo y Complementaria de Formalización de la Propiedad Informal, Acceso al suelo y Dotación de Servicios Básicos"; articulo 27 y 28 del Decreto Supremo N° 017-2006-VIVIENDA y la Ordenanza N° 313-2023-MDP/C, respectivamente.'),0,'J',false);

$pdf->Ln(6);
$pdf->SetFont('Arial', 'BU',9);
$pdf->Cell(0,5,utf8_decode('Observaciones:'),0,0,'L');
$pdf->SetFont('Arial', null,9);
$pdf->Ln(6);
$pdf->MultiCellBlt(154, 4, chr(149), utf8_decode('La presente constancia de posesión tendrá vigencia solamente hasta la fecha de la efectiva instalación, reposición o nueva conexión de los servicios básicos y elementales en el inmueble descrito en la presente.'));
$pdf->MultiCellBlt(154, 4, chr(149), utf8_decode('La presente Constancia de Posesión no constituye de ninguna manera y de ningún modo reconocimiento expreso ni tácito de algún derecho de propiedad sobre dicho predio, ni afecta en lo absoluto el legítimo derecho de propiedad que pudiera existir sobre el mencionado lote.'));
$pdf->MultiCellBlt(154, 4, chr(149), utf8_decode('La presente Constancia de Posesión, quedará nula de pleno derecho, de existir algún problema administrativo y/o legal.'));
$pdf->MultiCellBlt(154, 4, chr(149), utf8_decode('La presente Constancia de Posesión, no es válida para contrato de compra-venta y/o transferencia de posesión. '));
$pdf->MultiCellBlt(154, 4, chr(149), utf8_decode('El posesionario es el único que puede tramitar la solicitud de servicios básicos.'));
$pdf->MultiCellBlt(154, 4, chr(149), utf8_decode('Este documento tiene carácter de intransferible. '));
$pdf->Ln(3);

$ingreso = utf8_decode(date("d-m-Y", strtotime($showData->fechaIngreso))); 
$fecha_hoy = utf8_decode(strftime("%d de %B %Y.", strtotime($ingreso))) ;
$pdf->Cell(0,20,utf8_decode('Pachacácmac, '.$fecha_hoy),0,0,'R');
$pdf->Output();
exit;
?>
