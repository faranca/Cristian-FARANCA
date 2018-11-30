<?php 
	require '../fw/fw.php';
	require '../models/mNuevaeditreserva.php';
	//require '../views/vCaja.php';
	
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	$m=new mNuevaeditreserva;
	/*if(isset($_POST['nombre']) and isset($_POST['fecha']) and isset($_POST['hora_desde']) and isset($_POST['hora_hasta']) and isset($_POST['dni']) 
		and isset($_POST['idcancha']) and isset($_POST['telefono']) and isset($_POST['observacion']) ){
		$nombre = "'" . $_POST['nombre'] . "'";
		$fecha = "'" . $_POST['fecha'] . "'"; 
		$hora_desde = "'" . $_POST['hora_desde'] . "'";
		$hora_hasta = "'" . $_POST['hora_hasta'] . "'";
		$dni = $_POST['dni'];
		$telefono = "'" . $_POST['telefono'] . "'";
		$observacion = "'" . $_POST['observacion'] . "'";
		$Nuevaeditreserva=$m->NuevaReserva($nombre, $dni, $_POST['idcancha'], $fecha, $hora_desde, $hora_hasta, $telefono, $observacion);
	}
	$getUltimaReserva = $m->getUltimaReserva();
	//$BuscarCancha = $m->BuscarCancha();*/
	
	
	$v = new vNuevaeditreserva;
	/*if(isset($_POST['nombre']) and isset($_POST['fecha']) and isset($_POST['hora_desde']) and isset($_POST['hora_hasta']) and isset($_POST['dni']) and isset($_POST['idcancha'])){
		$v->Nuevaeditreserva = $Nuevaeditreserva;
	}
	$v->getUltimaReserva = $getUltimaReserva;
	//$v->BuscarCancha = $BuscarCancha;*/
	$v->render();
 ?>