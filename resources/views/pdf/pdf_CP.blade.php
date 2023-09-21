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
$expediente = utf8_decode(date("d-m-Y", strtotime($showData->fecha_expediente)));
$fecha_expediente = utf8_decode(strftime("%d de %B %Y", strtotime($expediente)));

$pdf->SetMargins(30 , 0);
$pdf->SetFont('Arial', null,9.5);
$pdf->Ln(3);
$pdf->Cell(21);
$pdf->Write(5, utf8_decode('Visto el Expediente Nº '.$showData->num_expediente.' de fecha: '.$fecha_expediente.'.
Organizado por '.$showData->nombre_completo.', identificado (a) con DNI N° '.$showData->numdoc.', quien solicita la Constancia de Posesión del Terreno Ubicado en la '.$showData->ubicacion.',  Distrito de Pachacámac, Provincia y Departamento de Lima; de conformidad con el informe Nº '.$showData->num_informe.'.'));

$pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://192.168.30.13/pdf/public/pdf/_token', 170,5,30, 0, 'PNG');

/* PARRAFO */
$pdf->Ln(6);
$pdf->SetFont('Arial', null,9);
$pdf->Ln(8);

$pdf->MultiCell(0,3,utf8_decode('La Subgerencia de Planeamiento Urbano, Catastro, Obras Privadas y Habilitaciones Urbanas de la Municipalidad Distrital de Pachacámac, otorga:'),0,'C',false);
$pdf->Ln(7);
$pdf->SetFont('Arial', 'B',25);
$pdf->MultiCell(0,3,utf8_decode('CONSTANCIA DE POSESIÓN'),0,'C',false);
$pdf->Ln(7);
$pdf->SetFont('Arial', 'B',12);
$pdf->MultiCell(0,3,utf8_decode('CON FINES PARA  TRAMITE DE SERVICIOS BÁSICOS'),0,'C',false);
$pdf->Ln(7);
$pdf->SetFont('Arial', 'BU',12);
$pdf->MultiCell(0,3,utf8_decode('N° '.$showData->num_informe.'-2023-MDP/GDU/SGPUCOPHU'),0,'C',false);

/* DATOS */
$pdf->SetFont('Arial', null,9.7);
$pdf->Ln(7);
$pdf->MultiCell(0,5,utf8_decode('A favor de '.$showData->nombre_completo.', identificado (a) con DNI N° '.$showData->numdoc.' y '.$showData->partner.', identificado (a) con DNI N° '.$showData->dni_partner.'; acreditando que ejerce POSESIÓN, sobre el predio ubicado en la '.$showData->ubicacion.', Jurisdicción del Distrito de Pachacámac, Provincia y Departamento de Lima. El predio cuenta con un área de '.$showData->area_predio.' metros cuadrados, según plano visado Nº '.$showData->plano_visado.' con Resolución Gerencial Nº '.$showData->num_resolucion.'.'),0,'J',false);

$pdf->SetFont('Arial', null,9.5);
$pdf->Ln(7);
$pdf->MultiCell(0,5,utf8_decode('Se otorga la presente Constancia de Posesión para fines del Otorgamiento de SERVICIOS BÁSICOS a que se refiere el artículo 24 de la Ley N° 28687 "Ley de Desarrollo y Complementarias de Formalización de la Propiedad Informal, Acceso al suelo y Dotados de Servicios Básicos", el mismo que no constituye reconocimiento alguno que afecta el derecho de propiedad de su titular.'),0,'J',false);
$pdf->Ln(7);
$pdf->MultiCell(0,5,utf8_decode('La presente Constancia de Posesión se emite de acuerdo a la Ordenanza Municipal '.$showData->num_ordenanza.' - 2023, Ordenanza para la Expedición de la Constancia de Posesión para los Servicios Básicos.'),0,'J',false);

$validez = utf8_decode(date("d-m-Y", strtotime($showData->fecha_validez))); 
$fecha_validez = utf8_decode(strftime("%d de %B %Y.", strtotime($validez))) ;
$pdf->MultiCellBlt(154, 4, chr(149), utf8_decode('La Presente Constancia de Posesión tendrá vigencia hasta la efectiva instalación de los servicios básicos.'));
$pdf->MultiCellBlt(154, 4, chr(149), utf8_decode('La Presente Constancia de Posesión, quedará NULO DE PLENO DERECHO, en caso de existir algún problema administrativo y/o legal.'));
$pdf->MultiCellBlt(154, 4, chr(149), utf8_decode('La presente constancia, no es válida para contrato de compra-venta y/o transferencia de posesión'));
$pdf->MultiCellBlt(154, 4, chr(149), utf8_decode('La presente constancia, tendrá validez hasta el '.$fecha_validez));
$pdf->MultiCellBlt(154, 4, chr(149), utf8_decode('El posesionario es el único que puede tramitar la solicitud de Servicios Básicos.'));
$pdf->MultiCellBlt(154, 4, chr(149), utf8_decode('No renovable.'));
$pdf->Ln(7);

$ingreso = utf8_decode(date("d-m-Y", strtotime($showData->fecha_ingreso))); 
$fecha_hoy = utf8_decode(strftime("%d de %B %Y.", strtotime($ingreso))) ;
$pdf->Cell(0,20,utf8_decode('Pachacácmac, '.$fecha_hoy),0,0,'R');
$pdf->Output();
exit;
?>
