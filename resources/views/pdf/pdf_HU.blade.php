<?php

use Codedge\Fpdf\Fpdf\Fpdf;
use Codedge\Fpdf\Fpdf\MultiCellBlt;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Crypt;
use App\Models\Licencia;

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('vendor/adminlte/dist/img/escudo.png',77,14,10);
        // Arial bold 15
        $this->SetFont('Arial','B',6);
        // Movernos a la derecha
        $this->Cell(1);
        // Título
        $this->Cell(112,15,'MUNICIPALIDAD DISTRITAL DE',0,0,'R');
        $this->Ln(3);
        $this->SetFont('Arial','B',13);
        $this->Cell(114,15,'PACHACAMAC',0,0,'R');
        $this->Ln(8);
        
        $this->SetFont('Arial','',6);
        $this->Ln(3);
        $this->Cell(NULL,0, utf8_decode('Año de la Unidad, la Paz y el Desarrollo'),0,0,'C');
        $this->Ln(5);
        $this->SetFont('Arial','B',6);
        $this->Cell(NULL,0,'GERENCIA DE DESARROLLO URBANO',0,0,'C');
        $this->Ln(3);
        $this->Cell(NULL,0,'SUBGERENCIA PLANEAMIENTO URBANO, CATASTRO, OBRAS PRIVADAS Y HABILITACIONES URBANAS',0,0,'C');
        $this->Ln(3);
        $this->SetFont('Arial','B',6);
        $this->Cell(NULL,0,utf8_decode('(LEY 29090)'),0,0,'C');
       
        /* $this->Ln(3); */
        $this->Ln(3);
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

        $this->Image('vendor/adminlte/dist/img/footer.png',10,250,190);
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
$expediente = utf8_decode(date("d-m-Y", strtotime($showData->expediente)));
$fecha_expediente = utf8_decode(strftime("%d/%m/%Y", strtotime($expediente)));

$emision = utf8_decode(date("d-m-Y", strtotime($showData->fecha_emision)));
$fecha_emision = utf8_decode(strftime("%d/%m/%Y", strtotime($emision)));

$vencimiento = utf8_decode(date("d-m-Y", strtotime($showData->fecha_vencimiento)));
$fecha_vencimiento = utf8_decode(strftime("%d/%m/%Y", strtotime($vencimiento)));

$pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://192.168.30.13/pdf/public/pdf/_token', 170,5,30, 0, 'PNG');

$pdf->SetFont('Arial', 'B',8);
$pdf->Cell(166,0,utf8_decode('Expediente: '),0,0,'R');
$pdf->SetFont('Arial', null,7);
$pdf->Cell(20,0,utf8_decode($showData->expediente),0,0,'R');

$pdf->Ln(3);
$pdf->SetFont('Arial', 'B',8);
$pdf->Cell(166,0,utf8_decode('Fecha de Expedición: '),0,0,'R');
$pdf->SetFont('Arial', null,7);
$pdf->Cell(20,0,utf8_decode($fecha_emision),0,0,'R');

$pdf->Ln(3);
$pdf->SetFont('Arial', 'B',8);
$pdf->Cell(166,0,utf8_decode('Fecha de Vencimiento: '),0,0,'R');
$pdf->SetFont('Arial', null,7);
$pdf->Cell(20,0,utf8_decode($fecha_vencimiento),0,0,'R');

$pdf->Ln(4);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(NULL,0,utf8_decode('RESOLUCION   DE  LICENCIA DE HABILITACIÓN URBANA'),0,0,'C');
$pdf->Ln(4);
$pdf->Cell(NULL,0,utf8_decode('N° '.$showData->num_resolucion.'-MDP/GDU/SGPUCOPHU'),0,0,'C');
$pdf->Ln(4);

/* PARRAFO */
$pdf->SetFont('Arial', null,5.5);
$pdf->MultiCell(0, 3, utf8_decode('LA MUNICIPALIDAD DE CHORRILLOS, de conformidad con la Ley N° 27972 "Ley Orgánica de Municipalidades", la Ley 29090 "Ley de Regulación de Habilitación Urbana y Edificaciones y su Reglamento" aprobado por el Decreto Supremo N° 029-2019-VIVIENDA y sus modificaciones, otorga:') , 0 , 'C' , false);

/* DATOS */
$pdf->SetFont('Arial', 'B',8);
$pdf->Cell(34,10,utf8_decode('DENOMINACIÓN '),0,0,'L');
$pdf->SetFont('Arial', null,7);
$pdf->Cell(70,10,utf8_decode(': '.$showData->denominacion),0,0,'L');
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B',8);
$pdf->Cell(34,10,utf8_decode('ZONIFICACIÓN '),0,0,'L');
$pdf->SetFont('Arial', null,7);
$pdf->Cell(70,10,utf8_decode(': '.$showData->zonificacion),0,0,'L');
$pdf->Ln(10);
/* $pdf->Cell(15,15,utf8_decode(': INDUSTRIA LIVIANA (I2) GRAN INDUSTRIA (I3)'),0,0,'L'); */

/* $pdf->Cell(130);
$pdf->MultiCell(30,3,utf8_decode(': '.$showData->zonificacion),0,'L',false); */

$pdf->SetFont('Arial', 'B',8);
$pdf->MultiCell(0,0,utf8_decode('PLANOS APROBADOS'),0,'L',false);
$pdf->SetFont('Arial', null,7);
$pdf->Cell(34);
$pdf->MultiCell(50,0,utf8_decode(': N° '.$showData->plano_aprobado),0,'L',false);

$pdf->SetFont('Arial', 'B',8);
$pdf->Ln(6);
$pdf->MultiCell(0,0,utf8_decode('UBICACIÓN DEL PREDIO: '),0,'L',false);
$pdf->SetFont('Arial', 'U',7);
$pdf->Cell(30);
$pdf->MultiCell(80,0,utf8_decode('             LIMA            '),0,'C',false);
$pdf->Cell(50);
$pdf->MultiCell(120,0,utf8_decode('           LIMA          '),0,'C',false);
$pdf->Cell(70);
$pdf->MultiCell(160,0,utf8_decode('           PACHACAMAC          '),0,'C',false);
$pdf->SetFont('Arial', null,8);
$pdf->Ln(3);
$pdf->Cell(30);
$pdf->MultiCell(80,0,utf8_decode('DEPARTAMENTO'),0,'C',false);
$pdf->Cell(50);
$pdf->MultiCell(120,0,utf8_decode('PROVINCIA'),0,'C',false);
$pdf->Cell(70);
$pdf->MultiCell(160,0,utf8_decode('DISTRITO'),0,'C',false);
$pdf->Ln(5);

$pdf->SetFont('Arial', 'U',7);
$pdf->Cell(30);
$pdf->MultiCell(80,0,utf8_decode('             '.$showData->urbanizacion_otro.'            '),0,'C',false);
$pdf->Cell(50);
$pdf->MultiCell(120,0,utf8_decode('             '.$showData->uc.'            '),0,'C',false);
$pdf->Cell(70);
$pdf->MultiCell(160,0,utf8_decode('            '.$showData->lote.'            '),0,'C',false);
$pdf->SetFont('Arial', null,8);
$pdf->Ln(3);
$pdf->Cell(30);
$pdf->MultiCell(80,0,utf8_decode('URB. / AA.HH. /  OTROS'),0,'C',false);
$pdf->Cell(50);
$pdf->MultiCell(120,0,utf8_decode('U.C'),0,'C',false);
$pdf->Cell(70);
$pdf->MultiCell(160,0,utf8_decode('SUB-LOTE'),0,'C',false);

$pdf->Ln(2);
$pdf->SetFont('Arial', 'B',8);
$pdf->Cell(40,8,utf8_decode('ADMINISTRADO'),0,0,'L');
$pdf->SetFont('Arial', null,7);
$pdf->Cell(0,8,utf8_decode(': '.$showData->propietario),0,0,'L');
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B',8);
$pdf->Cell(40,8,utf8_decode('RESPONSABLE DE OBRA '),0,0,'L');
$pdf->SetFont('Arial', null,7);
$pdf->Cell(0,8,utf8_decode(': '.$showData->responsable_obra),0,0,'L');
$pdf->Ln(4);
$pdf->SetFont('Arial', 'B',8);
$pdf->Cell(40,8,utf8_decode('CUADRO DE AREAS: '),0,0,'L');
$pdf->Ln(6);

/* $pdf->SetMargins(50 , 0,30); */
$pdf->SetFont('Arial', 'B',8);
$pdf->Ln(1);
/* $pdf->Ln(1);

$pdf->Cell(0, 3, utf8_decode('AREA DE ZONIFICACION Y APORTES'), 1, 1, 'C', 0);

$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(100, 3, utf8_decode('AREA BRUTA DEL TERRENO'), 1, 0, 'L', 0);
$pdf->SetFont('Arial', null,6);
$pdf->Cell(30, 3, utf8_decode($showData->area_bruta_terreno.' M2'), 1, 1, 'C', 0);

$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(100, 3, utf8_decode('AREA VIA METROPOLITANA '), 1, 0, 'L', 0);
$pdf->SetFont('Arial', null,6);
$pdf->Cell(30, 3, utf8_decode($showData->area_via_metropolitana.' M2'), 1, 1, 'C', 0);

$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(100, 3, utf8_decode('AREA AFECTA A APORTES'), 1, 0, 'L', 0);
$pdf->SetFont('Arial', null,6);
$pdf->Cell(30, 3, utf8_decode($showData->area_afecta_aportes.' M2'), 1, 1, 'C', 0);
$pdf->Ln(3);


$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(0, 3,utf8_decode('CUADRO N° 2: '),0,0,'L');
$pdf->Ln(3);
$pdf->Cell(0, 3, utf8_decode('CUADRO COMPARATIVO  DE AREA AFECTA A APORTES '.$showData->area_afecta_aportes.' M2'), 1, 1, 'C', 0);

$pdf->Cell(70, 3, utf8_decode('NORMA TH.030-RNE'), 1, 0, 'C', 0);
$pdf->Cell(25, 3, utf8_decode('%'), 1, 0, 'C', 0);
$pdf->Cell(35, 3, utf8_decode('SEGÚN CALCULO'), 1, 1, 'C', 0);

$pdf->SetFont('Arial', null,6);
$pdf->Cell(70, 3, utf8_decode('PARQUES ZONALES SERPAR '), 1, 0, 'L', 0);
$pdf->Cell(25, 3, utf8_decode('1 %'), 1, 0, 'C', 0);
$pdf->Cell(35, 3, utf8_decode($showData->parque_zonales.' M2'), 1, 1, 'C', 0);

$pdf->Cell(70, 3, utf8_decode('SERVICIOS PUBLICOS COMPLEMENTARIOS'), 1, 0, 'L', 0);
$pdf->Cell(25, 3, utf8_decode('2 %'), 1, 0, 'C', 0);
$pdf->Cell(35, 3, utf8_decode($showData->servicios_publicos.' M2'), 1, 1, 'C', 0);
$pdf->Ln(4);

$pdf->SetFont('Arial', 'B',6); */
$pdf->SetMargins(15 , 0);
/* $pdf->Ln(1);
$pdf->Cell(0, 3,utf8_decode('CUADRO N° 3:'),0,0,'L'); */
$pdf->Ln(3);

$pdf->Cell(80, 5, utf8_decode(''), 0, 0, 'C', 0);
$pdf->Cell(40, 5, utf8_decode('AREA'), 1, 0, 'C', 0);
$pdf->Cell(20, 5, utf8_decode(''), 0, 0, 'C', 0);
$pdf->Cell(30, 5, utf8_decode('PORCENTAJE'), 1, 1, 'C', 0);

$pdf->SetFont('Arial', '',7);

foreach ($dataAreaPorc as $dato) {
    foreach (['area_bruta_terreno', 'area_util_lotes', 'area_vias', 'area_aportes_recreacion', 'area_aportes_ministerio', 'area_otros_fines', 'area_parques_zonales', 'area_equipamiento_urbano', 'otros'] as $attribute) {
        $dato->$attribute = explode(';', $dato->$attribute);
    }
}

foreach ($dataAreaPorc as $dato) {
    $maxValues = max(
        count($dato->area_bruta_terreno),
        count($dato->area_util_lotes),
        count($dato->area_vias),
        count($dato->area_aportes_recreacion),
        count($dato->area_aportes_ministerio),
        count($dato->area_otros_fines),
        count($dato->area_parques_zonales),
        count($dato->area_equipamiento_urbano),
        count($dato->otros)
    );

    $pdf->Cell(80, 5, utf8_decode('ÁREA BRUTA DEL TERRENO'), 1, 0, 'L', 0);
    $pdf->Cell(40, 5, utf8_decode($dato->area_bruta_terreno[0].' m²'), 1, 0, 'C', 0);
    $pdf->Cell(20, 5, utf8_decode(''), 0, 0, 'C', 0);
    $pdf->Cell(30, 5, utf8_decode($dato->area_bruta_terreno[1].' %'), 1, 1, 'C', 0);

    $pdf->Cell(80, 5, utf8_decode('ÁREA ÚTIL DE LOTES'), 1, 0, 'L', 0);
    $pdf->Cell(40, 5, utf8_decode($dato->area_util_lotes[0].' m²'), 1, 0, 'C', 0);
    $pdf->Cell(20, 5, utf8_decode(''), 0, 0, 'C', 0);
    $pdf->Cell(30, 5, utf8_decode($dato->area_util_lotes[1].' %'), 1, 1, 'C', 0);

    $pdf->Cell(80, 5, utf8_decode('ÁREA DE VÍAS'), 1, 0, 'L', 0);
    $pdf->Cell(40, 5, utf8_decode($dato->area_vias[0].' m²'), 1, 0, 'C', 0);
    $pdf->Cell(20, 5, utf8_decode(''), 0, 0, 'C', 0);
    $pdf->Cell(30, 5, utf8_decode($dato->area_vias[1].' %'), 1, 1, 'C', 0);

    $pdf->Cell(80, 5, utf8_decode('ÁREA DE APORTES DE RECREACIÓN PÚBLICA'), 1, 0, 'L', 0);
    $pdf->Cell(40, 5, utf8_decode($dato->area_aportes_recreacion[0].' m²'), 1, 0, 'C', 0);
    $pdf->Cell(20, 5, utf8_decode(''), 0, 0, 'C', 0);
    $pdf->Cell(30, 5, utf8_decode($dato->area_aportes_recreacion[1].' %'), 1, 1, 'C', 0);

    $pdf->Cell(80, 5, utf8_decode('ÁREA DE APORTES PARA MINISTERIO DE EDUCACIÓN'), 1, 0, 'L', 0);
    $pdf->Cell(40, 5, utf8_decode($dato->area_aportes_ministerio[0].' m²'), 1, 0, 'C', 0);
    $pdf->Cell(20, 5, utf8_decode(''), 0, 0, 'C', 0);
    $pdf->Cell(30, 5, utf8_decode($dato->area_aportes_ministerio[1].' %'), 1, 1, 'C', 0);

    $pdf->Cell(80, 5, utf8_decode('ÁREA DE APORTES PARA OTROS FINES'), 1, 0, 'L', 0);
    $pdf->Cell(40, 5, utf8_decode($dato->area_otros_fines[0].' m²'), 1, 0, 'C', 0);
    $pdf->Cell(20, 5, utf8_decode(''), 0, 0, 'C', 0);
    $pdf->Cell(30, 5, utf8_decode($dato->area_otros_fines[1].' %'), 1, 1, 'C', 0);

    $pdf->Cell(80, 5, utf8_decode('ÁREA DE APORTES PARA PARQUES ZONALES'), 1, 0, 'L', 0);
    $pdf->Cell(40, 5, utf8_decode($dato->area_parques_zonales[0].' m²'), 1, 0, 'C', 0);
    $pdf->Cell(20, 5, utf8_decode(''), 0, 0, 'C', 0);
    $pdf->Cell(30, 5, utf8_decode($dato->area_parques_zonales[1].' %'), 1, 1, 'C', 0);

    $pdf->Cell(80, 5, utf8_decode('ÁREA PARA EQUIPAMIENTO URBANO'), 1, 0, 'L', 0);
    $pdf->Cell(40, 5, utf8_decode($dato->area_equipamiento_urbano[0].' m²'), 1, 0, 'C', 0);
    $pdf->Cell(20, 5, utf8_decode(''), 0, 0, 'C', 0);
    $pdf->Cell(30, 5, utf8_decode($dato->area_equipamiento_urbano[1].' %'), 1, 1, 'C', 0);

    $pdf->Cell(80, 5, utf8_decode('OTROS'), 1, 0, 'L', 0);
    $pdf->Cell(40, 5, utf8_decode($dato->otros[0].' m²'), 1, 0, 'C', 0);
    $pdf->Cell(20, 5, utf8_decode(''), 0, 0, 'C', 0);
    $pdf->Cell(30, 5, utf8_decode($dato->otros[1].' %'), 1, 1, 'C', 0);
    $pdf->Ln(3);
}

$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(30, 1,utf8_decode('N° TOTAL DE LOTES'),0,0,'L');
$pdf->SetFont('Arial', null,6);
$pdf->Cell(50, 1,utf8_decode(': LOTES'),0,0,'L');

$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(30, 1,utf8_decode('N° TOTAL DE MANZANAS'),0,0,'L');
$pdf->SetFont('Arial', null,6);
$pdf->Cell(50, 1,utf8_decode(': MANZANAS'),0,0,'L');
$pdf->Ln(6);

/* SEGUNDO SUBTITULO */
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(0,5,utf8_decode('OBSERVACIONES:'),0,0,'L');
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 5.5);

$pdf->Write(3, utf8_decode(''));
$pdf->Ln(6);

$pdf->MultiCell(0, 3, utf8_decode('1.- A excepción de las obras preliminares, para el inicio de la ejecución de la(s) obra(s) autorizada(s) con la Licencia, el administrado debe presentar Anexo H.') ,0 ,'L', false);
$pdf->MultiCell(0, 3, utf8_decode('2.- La obra a ejecutar debe ajustarse al proyecto autorizado. Ante cualquier modificación sustancias que se efectúe sin autorización, la Municipalidad podra disponer de la adoptación de medidas provisionales de inmediata ejecucución previstas en el numeral 6 del Artículo 10 de la Ley N° 29090. Ley de Regulación de Habilitaciones Urbanas y de Edificaciones.') ,0 ,'L', false);
$pdf->MultiCell(0, 3, utf8_decode('3.- La Licencia tiene una vigencia de 36 meses prorrogable por única vez por 12 meses, debiendo ser solicitada dentro de los 30 días calendario anteriores a su vencimiento.') ,0 ,'L', false);
$pdf->MultiCell(0, 3, utf8_decode('4.- Vencido el plazo de vigencia de la lLicencia, ésta puede ser revalidada por 36 meses.') ,0 ,'L', false);
$pdf->Ln(5);

$pdf->SetFont('Arial', 'BI', 5.5);
$pdf->Cell(0,3,utf8_decode('"LA OBRA AUTORIZADA DEBE AJUSTARSE AL PROYECTO APROBADO"'),0,0,'C');
$pdf->Ln(3);
$pdf->SetFont('Arial', '', 7);
$pdf->Cell(0,3,utf8_decode('FECHA: '.$fecha_emision),0,0,'L');

$pdf->Output();
exit;
?>
