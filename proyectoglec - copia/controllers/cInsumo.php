<?php 
	require '../fw/fw.php';
	require '../models/mInsumo.php';
	//require '../views/vCaja.php';
	
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	$m=new mInsumo;
	$Insumo=$m->Insumo();
	$BuscarDeporte = $m->BuscarDeporte();
	if(isset($_POST['Hdesde']) and isset($_POST['Hhasta']) and isset($_POST['fecha_reserva']) and isset($_POST['iddeporte']) and isset($_POST['txtInsumo'])){
		$Hdesde = "'" . $_POST['Hdesde']. ":00'";
		$Hhasta = "'" . $_POST['Hhasta'] . ":00'";
		$fecha_reserva = "'" . $_POST['fecha_reserva'] . "'";
		$iddeporte = $_POST['iddeporte'];
		//if(!is_null($_POST['txtInsumo'])){$txtInsumo = "%".$_POST['txtInsumo']."%";} else { $txtInsumo = "% %";}
		$txtInsumo = $_POST['txtInsumo'];
		$BuscarReserva = $m->BuscarReserva($Hdesde, $Hhasta, $fecha_reserva, $iddeporte);
		$InsumoDisponible = $m->InsumoDisponible($iddeporte, $fecha_reserva, $Hdesde, $Hhasta, $txtInsumo);
	}
	if(isset($_POST['cantidad']) and isset($_POST['idInsumo']) and isset($_POST['idReserva'])){
		try{
			$CarcarInsumoaReserva = $m->CarcarInsumoaReserva($_POST['idInsumo'], $_POST['cantidad'], $_POST['idReserva']);
			} catch (Exception $e) {
			   	echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			}
	}
	

	$v = new vInsumo;
	$v->Insumo = $Insumo;
	$v->BuscarDeporte = $BuscarDeporte;
	if(isset($_POST['Hdesde']) and isset($_POST['Hhasta']) and isset($_POST['fecha_reserva']) and isset($_POST['iddeporte'])){
		$v->BuscarReserva = $BuscarReserva;
		$v->InsumoDisponible = $InsumoDisponible;
	}
	if(isset($_POST['cantidad']) and isset($_POST['idInsumo']) and isset($_POST['idReserva'])){
			if(isset($CarcarInsumoaReserva)) $v->CarcarInsumoaReserva = $CarcarInsumoaReserva;
	}
	$v->render();
 ?>