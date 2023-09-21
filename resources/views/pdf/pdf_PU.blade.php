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
        $this->Image('vendor/adminlte/dist/img/escudo.png',55,12,18);
        // Arial bold 15
        $this->SetFont('Arial','B',11);
        // Movernos a la derecha
        $this->Cell(1);
        // Título
        $this->Ln(25);
        $this->Cell(0,15,'MUNICIPALIDAD DISTRITAL DE PACHACAMAC',0,0,'C');
        $this->Ln(4);
        $this->SetFont('Arial','B',9);
        $this->Cell(NULL,17,'GERENCIA DE DESARROLLO URBANO',0,0,'C');
        $this->Ln(4);
        $this->Cell(NULL,16,'SUBGERENCIA PLANEAMIENTO URBANO, CATASTRO, OBRAS PRIVADAS Y HABILITACIONES URBANAS',0,0,'C');
        $this->Ln(10);
        $this->Cell(NULL,16,utf8_decode('CERTIFICADO DE PARAMETROS URBANISTICOS Y EDIFICATORIOS'),0,0,'C');
        $this->Ln(4);
        $this->Cell(NULL,16,utf8_decode('N° 0007-2023-MDP/GDU-SGPUCIPHU'),0,0,'C');
        $this->Ln(15);
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
        $this->Image('vendor/adminlte/dist/img/footer.png',10,270,190);
        // Posición: a 1,5 cm del final
        $this->SetY(-20);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage( 'P' ,  'A4'); /* VERTICAL */
/* $pdf->AddPage( 'L' ,  'A4'); HORIZONTAL */

$pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://192.168.30.13/pdf/public/pdf/_token', 160,5,35, 0, 'PNG');

$pdf->SetMargins(30 , 0);
$pdf->Ln(1);
/* SUBTITULO */
$pdf->SetFont('Arial', 'B',8);
$pdf->Cell(-7,0,utf8_decode('INFORMACIÓN DEL SOLICITANTE'),0,0,'L');
$pdf->Ln(6);

/* SUBTITULO */
$pdf->SetFont('Arial', 'B',7);

$pdf->Cell(5);
$pdf->Cell(53,0,utf8_decode('N° de Expediente'),0,0,'L');
$pdf->SetFont('Arial', '',7);
$pdf->Cell(18,0,utf8_decode('--------------'),0,0,'L');
$pdf->Cell(0,0,utf8_decode('N° '.$showData->expediente),0,0,'L');
$pdf->Ln(5);

$pdf->Cell(5);
$pdf->SetFont('Arial', 'B',7);
$pdf->Cell(53,0,utf8_decode('Titular'),0,0,'L');
$pdf->SetFont('Arial', '',7);
$pdf->Cell(18,0,utf8_decode('--------------'),0,0,'L');
$pdf->Cell(0,0,utf8_decode($showData->titular),0,0,'L');
$pdf->Ln(5);

$pdf->Cell(5);
$pdf->SetFont('Arial', 'B',7);
$pdf->SetFont('Arial', 'B',7);
$pdf->Cell(53,0,utf8_decode('Dirección'),0,0,'L');
$pdf->SetFont('Arial', '',7);
$pdf->Cell(18,0,utf8_decode('--------------'),0,0,'L');
$pdf->Cell(0,0,utf8_decode($showData->direccion),0,0,'L');
$pdf->Ln(5);

$pdf->Cell(5);
$pdf->SetFont('Arial', 'B',7);
$pdf->Cell(53,0,utf8_decode('Partida'),0,0,'L');
$pdf->SetFont('Arial', '',7);
$pdf->Cell(18,0,utf8_decode('--------------'),0,0,'L');
$pdf->Cell(0,0,utf8_decode($showData->partida),0,0,'L');
$pdf->Ln(8);

$pdf->SetFont('Arial', 'B',8);
$pdf->Cell(-7,0,utf8_decode('INFORMACIÓN TECNICA'),0,0,'L');
$pdf->Ln(6);

$pdf->SetFont('Arial', 'B',7);
$pdf->Cell(5);
$pdf->SetFont('Arial', 'B',7);
$pdf->Cell(53,0,utf8_decode('Área Territorial'),0,0,'L');
$pdf->SetFont('Arial', '',7);
$pdf->Cell(18,0,utf8_decode('--------------'),0,0,'L');
$pdf->Cell(0,0,utf8_decode('Pachacamac'),0,0,'L');
$pdf->Ln(5);

$pdf->Cell(5);
$pdf->SetFont('Arial', 'B',7);
$pdf->Cell(53,0,utf8_decode('Área de Tratamiento Normativo'),0,0,'L');
$pdf->SetFont('Arial', '',7);
$pdf->Cell(18,0,utf8_decode('--------------'),0,0,'L');
$pdf->Cell(0,0,utf8_decode(''. $showData->area_tratamiento),0,0,'L');
$pdf->Ln(5);

$pdf->Cell(5);
$pdf->SetFont('Arial', 'B',7);
$pdf->Cell(53,0,utf8_decode('Zonificación'),0,0,'L');
$pdf->SetFont('Arial', '',7);
$pdf->Cell(18,0,utf8_decode('--------------'),0,0,'L');
$pdf->Cell(0,0,utf8_decode(''. $showData->zonificacion),0,0,'L');
$pdf->Ln(5);

foreach ($infTecnica as $data) {
    foreach (['vivienda', 'residencial', 'condominio'] as $attribute) {
        $data->$attribute = explode(':', $data->$attribute);
    }
}

$titulos = ['Uso de suelo permisible y compatibles', 'Porcentaje mínimo de área libre', 'Altura máxima', 'Área de lote normativo'];

foreach ($infTecnica as $data) {
    $maxValues = max(
        count($data->vivienda),
        count($data->residencial),
        count($data->condominio),
    );

    for ($i = 0; $i < $maxValues; $i++) {
        $pdf->Cell(5);
        $pdf->SetFont('Arial', 'B',7);
        $pdf->Cell(53,0,utf8_decode(''.$titulos[$i]),0,0,'L');
        $pdf->SetFont('Arial', '',7);
        $pdf->Cell(18,0,utf8_decode('--------------'),0,0,'L');
        $pdf->Cell(60,0,utf8_decode('Vivienda unifamiliar, comercio vecinal y zonal'),0,0,'L');
        $pdf->Cell(0,0,utf8_decode(''.$data->vivienda[$i]),0,0,'L');
        $pdf->Ln(3);
        $pdf->Cell(76);
        $pdf->Cell(60,0,utf8_decode('Conjunto residenciales y multifamiliares'),0,0,'L');
        $pdf->Cell(0,0,utf8_decode(''.$data->residencial[$i]),0,0,'L');
        $pdf->Ln(3);
        $pdf->Cell(76);
        $pdf->Cell(60,0,utf8_decode('Conjunto residencial o condominios'),0,0,'L');
        $pdf->Cell(0,0,utf8_decode(''. $data->condominio[$i]),0,0,'L');
        $pdf->Ln(5);
    }
}

/* $pdf->Cell(5);
$pdf->SetFont('Arial', 'B',7);
$pdf->Cell(53,0,utf8_decode('Altura máxima'),0,0,'L');
$pdf->SetFont('Arial', '',7);
$pdf->Cell(18,0,utf8_decode('--------------'),0,0,'L');
$pdf->Cell(60,0,utf8_decode('Vivienda unifamiliar, comercio vecinal y zonal'),0,0,'L');
$pdf->Cell(0,0,utf8_decode(''. $showData->vivienda),0,0,'L');
$pdf->Ln(3);
$pdf->Cell(76);
$pdf->Cell(60,0,utf8_decode('Conjunto residenciales y multifamiliares'),0,0,'L');
$pdf->Cell(0,0,utf8_decode(''. $showData->residencial),0,0,'L');
$pdf->Ln(3);
$pdf->Cell(76);
$pdf->Cell(60,0,utf8_decode('Conjunto residencial o condominios'),0,0,'L');
$pdf->Cell(0,0,utf8_decode(''. $showData->condominio),0,0,'L');
$pdf->Ln(5); */

$pdf->Cell(5);
$pdf->SetFont('Arial', 'B',7);
$pdf->Cell(53,0,utf8_decode('Retiros'),0,0,'L');
$pdf->SetFont('Arial', '',7);
$pdf->Cell(18,0,utf8_decode('--------------'),0,0,'L');
$pdf->Cell(60,0,utf8_decode('Frente a avenidas'),0,0,'L');
$pdf->Cell(0,0,utf8_decode(''.$showData->frente_avenidas),0,0,'L');
$pdf->Ln(3);
$pdf->Cell(76);
$pdf->Cell(60,0,utf8_decode('Frente a calles'),0,0,'L');
$pdf->Cell(0,0,utf8_decode(''.$showData->frente_calles),0,0,'L');
$pdf->Ln(5);

$pdf->Cell(5);
$pdf->SetFont('Arial', 'B',7);
$pdf->Cell(53,0,utf8_decode('Frente de lote mínimo'),0,0,'L');
$pdf->SetFont('Arial', '',7);
$pdf->Cell(18,0,utf8_decode('--------------'),0,0,'L');
$pdf->Cell(0,0,utf8_decode(''.$showData->frente_lote),0,0,'L');
$pdf->Ln(5);

$pdf->Cell(5);
$pdf->SetFont('Arial', 'B',7);
$pdf->Cell(53,0,utf8_decode('Estacionamientos'),0,0,'L');
$pdf->SetFont('Arial', '',7);
$pdf->Cell(18,0,utf8_decode('--------------'),0,0,'L');
$pdf->Cell(0,0,utf8_decode(''. $showData->estacionamiento),0,0,'L');
$pdf->Ln(8);

/* PARRAFO */
$pdf->SetFont('Arial', '',6);
$pdf->Cell(0,0,utf8_decode('*Actividades comerciales y productivas compatibles con el uso residencial.'),0,0,'L');
$pdf->Ln(8);

$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(0,0,utf8_decode('Especificaiones normativas'),0,0,'L');
$pdf->Ln(3);
$pdf->SetFont('Arial', '',6);
$pdf->Cell(0,0,utf8_decode('De aplicación exclusivamente en el Área de Tratamiento Normativo IV, Cuenca Baja del Río Lurín.'),0,0,'L');
$pdf->Ln(3);

/* NOTAS */
$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(0,0,utf8_decode('Notas:'),0,0,'L');
$pdf->SetMargins(35 , 0);
$pdf->Ln(3);
$pdf->SetFont('Arial', '',6);
$pdf->MultiCellBlt(154, 3, '-   ', utf8_decode('El área gráfica y la ubicación están de acuerdo a los datos consignados por el administrado en la solicitud.'));
$pdf->MultiCellBlt(154, 3, '-   ', utf8_decode('El certificado no tiene efecto si el predio se encuentra en curso de proceso judicial pendiente de resolver.'));
$pdf->MultiCellBlt(154, 3, '-   ', utf8_decode('El presente Certificado NO acredita la propiedad del inmueble - NO autoriza la ejecución de Obras de Edificación - No acredita la Habilitación Urbana o Formalización de Propiedad Informal.'));
$pdf->MultiCellBlt(154, 3, '-   ', utf8_decode('Para obtener Licencia de Edificación deberá contar con Proyecto de Habilitación Urbana aprobado.'));
$pdf->SetMargins(30 , 0);
$pdf->Ln(7);

/* BASE LEGAL */
$pdf->SetFont('Arial', 'B',6);
$pdf->Cell(0,0,utf8_decode('Base Legal para la emisión de Parámetros Urbanos y Edificatorios:'),0,0,'L');
$pdf->SetMargins(35 , 0);
$pdf->Ln(3);
$pdf->SetFont('Arial', '',6);
$pdf->MultiCellBlt(154, 3, '-   ', utf8_decode('El presente Certificado de Parámetros Urbanísticos y Edificatorios se expide para los fines establecidos de acuerdo a la Ley N°29090 Ley de Regulación de Habilitaciones Urbanas y de Edificaciones, Decreto Supremo N°006-2017-VIVIENDA, que aprueba el Texto Único Ordenado de la Ley N°29090 y Ordenanza N°2236-2020-MML de Zonificación.'));
$pdf->MultiCellBlt(154, 3, '-   ', utf8_decode('En merito al Informe Técnico N°'.$showData->num_informe.'-DM.'));
$pdf->Ln(5);

setlocale(LC_TIME, "spanish");
$emision = utf8_decode(date("d-m-Y", strtotime($showData->fecha_emision)));
$fecha_emision = utf8_decode(strftime("%d de %B del %Y.", strtotime($emision)));

$pdf->SetFont('Arial', '',7);
$pdf->Cell(50,0,utf8_decode('Fecha de Emisión:'),0,0,'L');
$pdf->SetFont('Arial', 'B',7);
$pdf->Cell(0,0,utf8_decode($fecha_emision),0,0,'L');
$pdf->Ln(4);

$vencimiento = utf8_decode(date("d-m-Y", strtotime($showData->fecha_vencimiento)));
$fecha_vencimiento = utf8_decode(strftime("%d de %B del %Y.", strtotime($vencimiento)));

$pdf->SetFont('Arial', '',7);
$pdf->Cell(50,0,utf8_decode('Fecha de Vencimiento: '),0,0,'L');
$pdf->SetFont('Arial', 'B',7);
$pdf->Cell(0,0,utf8_decode($fecha_vencimiento.' (Vigencia de 36 meses según Ley N° 29090)'),0,0,'L');
$pdf->Ln(4);

$pdf->Output();
exit;
?>
