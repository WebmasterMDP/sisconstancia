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
        $this->Image('vendor/adminlte/dist/img/escudo.png',55,12,18);
        // Arial bold 15
        $this->SetFont('Arial','B',12);
        // Movernos a la derecha
        $this->Cell(1);
        // Título
        $this->Cell(130,15,'MUNICIPALIDAD DISTRITAL DE',0,0,'R');
        $this->Ln(7);
        $this->SetFont('Arial','B',25);
        $this->Cell(131,15,'PACHACAMAC',0,0,'R');
        $this->Ln(10);
        $this->SetFont('Arial','B',10);
        $this->Cell(NULL,17,'GERENCIA DE DESARROLLO URBANO',0,0,'C');
        $this->Ln(6);
        $this->Cell(NULL,19,'SUBGERENCIA PLANEAMIENTO URBANO, CATASTRO, OBRAS PRIVADAS Y HABILITACIONES URBANAS',0,0,'C');
        $this->Ln(3);
        $this->SetFont('Arial','B',9);
        $this->Cell(NULL,21,utf8_decode('(LEY 29090)'),0,0,'C');

        $this->Ln(8);
        
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

$pdf->SetFont('Arial','BU',14);

$pdf->Cell(NULL,21,utf8_decode('RESOLUCIÓN DE CONFORMIDAD DE OBRA'),0,0,'C');
$pdf->Ln(4);
$pdf->Cell(NULL,23,utf8_decode('N° '.$showData->num_resolucion.'-MDP/GDU-SGPUCOPHU'),0,0,'C');

/* $pdf->Ln(3); */
$pdf->Ln(15);

$pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://192.168.30.13/pdf/public/pdf/_token', 160,5,35, 0, 'PNG');

/* SUBTITULO */
$pdf->SetFont('Arial', 'BI',9);
$pdf->Cell(20,15,utf8_decode('Expediente: '),0,0,'L');
$pdf->SetFont('Arial', 'I',9);
$pdf->Cell(40,15,utf8_decode($showData->expediente),0,0,'L');
$pdf->SetFont('Arial', 'BI',9);
$pdf->Cell(35,15,utf8_decode('Fecha de Expedición: '),0,0,'L');
$pdf->SetFont('Arial', 'I',9);
$pdf->Cell(0,15,utf8_decode($showData->fecha_expediente),0,0,'L');
$pdf->Ln(7);

/* SUBTITULO */
$pdf->Cell(1,15,utf8_decode('Subgerencia de Planeamiento Urbano, Catastro, Obras Privadas y Habilitaciones Urbanas'),0,0,'L');
$pdf->Ln(7);
$pdf->SetFont('Arial', 'B',9);
$pdf->Cell(1,15,utf8_decode('Certifica:'),0,0,'L');
$pdf->Ln(12);

/* PARRAFO */
$pdf->SetFont('Arial', null,10);
$pdf->Write(5, utf8_decode('Que de conformidad con la Inspección Ocular realizado por el Personal Técnico de la Subgerencia de Planeamiento Urbano, Catastro, Obras Privadas y Habilitaciones Urbanas al predio de.'));
/* $pdf->MultiCell(0, 4, utf8_decode('Que de conformidad con la Inspección Ocular realizado por el Personal Técnico de la Subgerencia de Obras Privadas y Control Urbano al predio de') ,0 ,'J', false); */
$pdf->SetFont('Arial', 'B',10);
$pdf->Write(5, utf8_decode(' '.$showData->propietario));
$pdf->SetFont('Arial', null,10);
$pdf->Write(5, utf8_decode(', ubicado en '));
$pdf->SetFont('Arial', 'B',10);
$pdf->Write(5, utf8_decode($showData->ubicacion));
$pdf->SetFont('Arial', null,10);
$pdf->Write(5, utf8_decode(' de este distrito se encuentra concluida de Conformidad a:'));
$pdf->Ln(8);

$pdf->SetFont('Arial', null,8);
$pdf->Cell(75, 5, utf8_decode('N° de Licencia de Edificación: '.$showData->num_licencia), 1, 0, 'L', 0);
$pdf->Cell(65, 5, utf8_decode('N° de Expediente: '.$showData->expediente), 1, 0, 'L', 0);
$pdf->Cell(50, 5, utf8_decode('Monto: '.$showData->valor_obra), 1, 0, 'L', 0);
$pdf->Ln(4);

/* DATOS */
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Tipo de edificación '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(50,15,utf8_decode(': '.$showData->tipo_edificacion),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Área Terreno '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(15,15,utf8_decode(': '.$showData->area_terreno.' m²'),0,0,'L');
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Área Construida '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(50,15,utf8_decode(': '.$showData->area_construida.' m²'),0,0,'L');
$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Otros '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(15,15,utf8_decode(': '.$showData->otros),0,0,'L');
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B',8.5);
$pdf->Cell(34,15,utf8_decode('Valor de la Obra '),0,0,'L');
$pdf->SetFont('Arial', null,8);
$pdf->Cell(15,15,utf8_decode(': S/ '.$showData->valor_obra),0,0,'L');
$pdf->Ln(12);

$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(20, 5, utf8_decode(''), 0, 0, 'C', 0);
$pdf->Cell(27, 5, utf8_decode('ZONIFICACIÓN'), 1, 0, 'C', 0);
$pdf->Cell(18, 5, utf8_decode('AREA E:U. '), 1, 0, 'C', 0);
$pdf->Cell(35, 5, utf8_decode('ALTURA EDIFICACION'), 1, 0, 'C', 0);
$pdf->Cell(18, 5, utf8_decode('RETIRO'), 1, 0, 'C', 0);
$pdf->Cell(22, 5, utf8_decode('AREA LIBRE'), 1, 0, 'C', 0);
$pdf->Cell(19, 5, utf8_decode('DENSIDAD'), 1, 0, 'C', 0);
$pdf->Cell(31, 5, utf8_decode('ESTACIONAMIENTO'), 1, 1, 'C', 0);

$pdf->Cell(20, 5, utf8_decode('NORMATIVO'), 1, 0, 'C', 0);
$pdf->SetFont('Arial', '',6);
$pdf->Cell(27, 5, utf8_decode($showData->zonificacion_normativa), 1, 0, 'C', 0);
$pdf->Cell(18, 5, utf8_decode($showData->area_eu_normativa), 1, 0, 'C', 0);
$pdf->Cell(35, 5, utf8_decode($showData->altura_edif_normativa), 1, 0, 'C', 0);
$pdf->Cell(18, 5, utf8_decode($showData->retiro_normativa), 1, 0, 'C', 0);
$pdf->Cell(22, 5, utf8_decode($showData->area_libre_normativa), 1, 0, 'C', 0);
$pdf->Cell(19, 5, utf8_decode($showData->densidad_normativa), 1, 0, 'C', 0);
$pdf->Cell(31, 5, utf8_decode($showData->estacionamiento_normativa), 1, 1, 'C', 0);

$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(20, 5, utf8_decode('PROYECTO'), 1, 0, 'C', 0);
$pdf->SetFont('Arial', '',6);
$pdf->Cell(27, 5, utf8_decode($showData->zonificacion_proyecto), 1, 0, 'C', 0);
$pdf->Cell(18, 5, utf8_decode($showData->area_eu_proyecto), 1, 0, 'C', 0);
$pdf->Cell(35, 5, utf8_decode($showData->altura_edif_proyecto), 1, 0, 'C', 0);
$pdf->Cell(18, 5, utf8_decode($showData->retiro_proyecto), 1, 0, 'C', 0);
$pdf->Cell(22, 5, utf8_decode($showData->area_libre_proyecto), 1, 0, 'C', 0);
$pdf->Cell(19, 5, utf8_decode($showData->densidad_proyecto), 1, 0, 'C', 0);
$pdf->Cell(31, 5, utf8_decode($showData->estacionamiento_proyecto), 1, 1, 'C', 0);

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

foreach ($pisosData as $piso) {
    foreach (['antiguedad', 'muro_columna', 'techos', 'piso', 'puerta_ventana', 'revestimiento', 'bano', 'inst_elect', 'area_construida'] as $attribute) {
        $piso->$attribute = explode('-', $piso->$attribute);
    }
}

foreach ($pisosData as $piso) {
    $maxValues = max(
        count($piso->piso),
        count($piso->antiguedad),
        count($piso->muro_columna),
        count($piso->techos),
        count($piso->puerta_ventana),
        count($piso->revestimiento),
        count($piso->bano),
        count($piso->inst_elect),
        count($piso->area_construida)
    );

    for ($i = 0; $i < $maxValues; $i++) {
        $pdf->Cell(12, 6, utf8_decode('PISO '.$i+1), 1, 0, 'C', 0);
        $pdf->Cell(16, 6, utf8_decode($piso->antiguedad[$i].''), 1, 0, 'C', 0);
        $pdf->Cell(22, 6, utf8_decode($piso->muro_columna[$i].''), 1, 0, 'C', 0);
        $pdf->Cell(12, 6, utf8_decode($piso->techos[$i].''), 1, 0, 'C', 0);
        $pdf->Cell(9, 6, utf8_decode($piso->piso[$i].''), 1, 0, 'C', 0);
        $pdf->Cell(27, 6, utf8_decode($piso->puerta_ventana[$i].''), 1, 0, 'C', 0);
        $pdf->Cell(19, 6, utf8_decode($piso->revestimiento[$i].''), 1, 0, 'C', 0);
        $pdf->Cell(9, 6, utf8_decode($piso->bano[$i].''), 1, 0, 'C', 0);
        $pdf->Cell(37, 6, utf8_decode($piso->inst_elect[$i].''), 1, 0, 'C', 0);
        $pdf->Cell(27, 6, utf8_decode($piso->area_construida[$i].''), 1, 1, 'C', 0);
    }
}

$pdf->Ln(4);

/* SEGUNDO PARRAFO */
$pdf->SetFont('Arial', null,9);
$pdf->MultiCell(0, 4, utf8_decode('Se expide esta Resolución de acuerdo al TUO de la Ley N° 29090 o aprobado con el D.S. 029-2019-VIVIENDA.') ,0 ,'J', false);

/* SEGUNDO SUBTITULO */
$pdf->SetFont('Arial', 'UB', 9);
$pdf->Cell(0,15,utf8_decode('OBSERVACIONES:'),0,0,'L');
$pdf->Ln(15);

$pdf->Output();
exit;
?>
