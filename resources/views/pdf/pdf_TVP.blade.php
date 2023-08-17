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
        $this->Image('vendor/adminlte/dist/img/escudo.png',10,8,20);

        $this->SetFont('Arial',null,16);

        $this->Cell(20);

        $this->Cell(15,7,'MUNICIPALIDAD DE',0,0,'L');
        $this->Ln(7);
        $this->Cell(20);
        $this->SetFont('Arial','B',21);
        $this->Cell(25,7,utf8_decode('PACHACÁMAC'),0,0,'L');
        $this->Ln(12);
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

setlocale(LC_TIME, "spanish");
$instalacion = utf8_decode(date("d-m-Y", strtotime($showData->fecha_instalacion)));
$fecha_instalacion = utf8_decode(strftime("%d de %B del %Y", strtotime($instalacion)));

$expediente = utf8_decode(date("d-m-Y", strtotime($showData->fecha_expediente)));
$fecha_expediente = utf8_decode(strftime("%d de %B del %Y", strtotime($expediente)));

$pdf->Image('https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl=http://192.168.30.13/pdf/public/pdf/_token', 160,5,40, 0, 'PNG');

/* TITULO */
$pdf->SetFont('Arial', 'B',14);
$pdf->Cell(0,15,utf8_decode('AUTORIZACIÓN N°'),0,0,'C');
$pdf->Ln(7);
$pdf->SetFont('Arial', 'B',18);
$pdf->Cell(0,15,utf8_decode('AUTORIZACIÓN DE TRABAJOS EN VÍA PÚBLICA'),0,0,'C');
$pdf->Ln(10);

$pdf->SetMargins(28 , 0);
$pdf->Ln(1);

/* SUBTITULO */
$pdf->SetFont('Arial', 'BI',8.2);
$pdf->Cell(26,15,utf8_decode('VISTO:'),0,0,'R');
$pdf->Ln(10);

$pdf->SetFont('Arial', '',8.2);
$pdf->MultiCell(0,3.5,utf8_decode('             El Expediente Nº '.$showData->num_expediente.' de fecha '.$fecha_expediente.', seguido por la Sr. '.$showData->nombre_completo.'  identificado con DNI N° '.$showData->numdoc.', quien solicita la autorización de trabajos en la vía pública con el fin de ejecutar la dotación de instalaciones domiciliarias de '.$showData->concepto_servicio.', según lo otorgado por '.$showData->proveedor_servicio.' con fecha '.$fecha_instalacion.', para el predio ubicado en '.$showData->ubicacion.'. Se Procede a:'),0,'J',false);
$pdf->Ln(5);

$pdf->MultiCell(0,3.5,utf8_decode('               Habiendo realizado el pago correspondiente a los derechos administrativos de acuerdo con el comprobante Nº '.$showData->comprobante.', y efectuado el informe N.º '.$showData->num_informe.', se procede a:'),0,'J',false);
$pdf->Ln(0.1);

/* PARRAFO */

$pdf->SetFont('Arial', 'BI',8.2);
$pdf->Cell(31,15,utf8_decode('OTORGAR:'),0,0,'R');
$pdf->SetMargins(35 , 0);
$pdf->SetFont('Arial', 'B',8);
$pdf->Ln(10);
$pdf->MultiCell(0,3.5,utf8_decode('Autorización para la ocupación de la vía pública con el fin de ejecutar de dotación de instalaciones domiciliarias de '.$showData->concepto_servicio.' , según lo otorgado por '.$showData->proveedor_servicio.'  con fecha '.$fecha_instalacion.', para el predio ubicado en '.$showData->ubicacion.', departamento y provincia Lima.'),0,'J',false);
$pdf->SetMargins(28 , 0);

/* DATOS */
$pdf->Ln(0.1);

/* SEGUNDO PARRAFO */
$pdf->SetFont('Arial', 'BI',8.2);
$pdf->Cell(23,15,utf8_decode('NOTA:'),0,0,'R');
/* SEGUNDO SUBTITULO */
$pdf->SetFont('Arial', 'I', 8.2);
$pdf->Ln(10);
$pdf->MultiCell(0,3.5,utf8_decode('Los trabajos deberán ser efectuados de acuerdo a las Normas del Reglamento Nacional de Edificaciones para ejecución de Obras en la Vía Pública.'),0,'J',false);
$pdf->Ln(1);

$pdf->write(5, utf8_decode('La asosiación se comprometerá a:'));
$pdf->Ln(5);
$pdf->MultiCellBlt(154, 4, "1.  ", utf8_decode('Informar a la Municipalidad el día de inicio de los trabajos a realizar, los mismos que se autorizan a ser ejecutados de lunes a sábado para así evitar las molestias a los vecinos y visitantes (turistas).'));
$pdf->MultiCellBlt(154, 4, "2.  ", utf8_decode('Retirar el desmonte generado antes de las 24 horas (vía pública).'));
$pdf->MultiCellBlt(154, 4, "3.  ", utf8_decode('Colocar señalización de día y de noche utilizando material reflectivo a fin de evitar accidentes.'));
$pdf->MultiCellBlt(154, 4, "4.  ", utf8_decode('El Solicitante deberá respetar las secciones de Vías de acuerdo a los Planos de Lotización.'));
$pdf->MultiCellBlt(154, 4, "5.  ", utf8_decode('Reponer a su estado original las pistas y veredas o conexiones que por efecto de trabajo fueran deterioradas o rotas.'));
$pdf->MultiCellBlt(154, 4, "6.  ", utf8_decode('El tiempo programado para los trabajos no deberá excederse de 4 días calendario de acuerdo a su cronograma de avances de obra del Expediente Técnico.'));
$pdf->MultiCellBlt(154, 4, "7.  ", utf8_decode('Cualquier daño ocasionado a los Inmuebles Aledaños o Terceras personas será de responsabilidad exclusiva del Solicitante y tendrá que ser atendidas en un lapso de 24 horas.'));
$pdf->MultiCellBlt(154, 4, "8.  ", utf8_decode('De la empresa prestadora de servicio, debiendo de hacerse cargo de los daños materiales que ocasione.'));
$pdf->Ln(5);

$pdf->SetFont('Arial', 'BI',8.2);
$pdf->write(4, utf8_decode('El incumplimiento de cualquiera de estas indicaciones dejará sin efecto la presente autorización aplicándose las sanciones a que hubiera lugar.'));
$pdf->Ln(4);
$pdf->write(4, utf8_decode('Se hace la indicación expresa que la presente '));
$pdf->SetFont('Arial', 'BIU',8.2);
$pdf->write(4, utf8_decode('autorización'));
$pdf->SetFont('Arial', 'BI',8.2);
$pdf->write(4, utf8_decode(' NO '));
$pdf->SetFont('Arial', 'BIU',8.2);
$pdf->write(4, utf8_decode('acredita derecho de propiedad o posesión'));
$pdf->SetFont('Arial', 'BI',8.2);
$pdf->write(4, utf8_decode(' sobre el predio en cuestión. '));
$pdf->Ln(4);
$pdf->write(4, utf8_decode('NOTA:'));
$pdf->Ln(4);
$pdf->write(4, utf8_decode('EL DOCUMENTO TIENE UNA VIGENCIA DE TREINTA (30) DIAS CALENDARIOS A PARTIR DE LA FECHA DE SU RECEPCIÓN.'));
$pdf->Ln(10);

$pdf->SetFont('Arial', '',8.2);

$hoy = utf8_decode(date("d-m-Y", strtotime(date("d-m-Y"))));
$fecha_hoy = utf8_decode(strftime("%d de %B del %Y.", strtotime($hoy)));

$pdf->Cell(0,0,utf8_decode('Pachacamac, '.$fecha_hoy),0,0,'R');

$pdf->Output();
exit;
?>
