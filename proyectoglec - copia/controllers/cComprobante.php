<?php
require('../fpdf/fpdf.php');
$pdf = new FPDF('P','mm','A4');/* ('orientacion', 'unidad de medida', 'tamaño de hoja')*/
date_default_timezone_set('America/Argentina/Buenos_Aires');
$pdf->AddPage(); /* nueva hoja */
$pdf->SetFont('arial','B',14);/* fuente ('tipo de letra', 'B - subrayado vacio normal - S subrayado', tamaño de letra) */
$pdf->Cell(70,10,'Comprobante de pago',1,0,'C');/* 210 es el ancho de la hoja */
/* (ancho de la celda, alto de la celda, 'texto', 0 sin borde - 1 con borde, posicion de inicio, 'L o vacia: alineación izquierda (valor por defecto) - C: centro - R: alineación derecha') */
$pdf->SetFont('arial','',14);
$pdf->Cell(45,10,'');
$comp = unserialize($_GET['comp']);
function zero_fill ($valor, $long = 0)
{
    return str_pad($valor, $long, '0', STR_PAD_LEFT);
}
$prefijo = zero_fill($comp['prefijo'], 4);
$numero_inicial = zero_fill($comp['numero_inicial'], 4);
$ultimo_numero = zero_fill($comp['ultimo_numero'], 6);
$pdf->Cell(75,10,'n: '.$prefijo.' - '.$numero_inicial.' - '.$ultimo_numero.' - '.$comp['idcaja'].' - '.$comp['idcomprobantecfg'],1,0,'C'); 
/* si ya use 40 tengo q restarle 40 a 200*/
$pdf->ln();/* salto de linea */
$pdf->Cell(60,10,'Factura '.$comp['tipo'],1,1,'C');
$pdf->ln();
$pdf->ln();
$pdf->Cell(190,10,'Club Los pibes',1,0,'C');/* estoy usando 190mm*/
$pdf->ln();
$pdf->Cell(65,10,'Calle: No tengo idea',1,0,'C');
$pdf->Cell(65,10,'Tel.: 011-4444-4444',1,0,'C');
$pdf->Cell(60,10,'Fecha:' . date("d/m/Y"),1,0,'C');
$pdf->ln();
if(isset($_GET['dato'])){
	
	$dato = unserialize($_GET['dato']);
	$count = 1;
	$total = 0;
	foreach( $dato as $valor){
		$count++;
		$total += $valor['importe'];
		$pdf->Cell(130,10,$valor['descripcion'],1,0,'C');
		$pdf->Cell(60,10,'$' . $valor['importe'],1,0,'C');
		$pdf->ln();
	}
	for($i=$count;$i<=10;$i++){
		$pdf->Cell(130,10,'',1,0,'C');
		$pdf->Cell(60,10,'',1,0,'C');
		$pdf->ln();
	}
	$pdf->Cell(95,10,'',0,0,'C');
	$pdf->Cell(35,10,'Total:',0,0,'C');
	$pdf->Cell(60,10,'$' . $total,1,0,'C');

}

$pdf->Output();
?>