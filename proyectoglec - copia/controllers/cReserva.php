<?php 
	require '../fw/fw.php';
	require '../models/mReserva.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	$m=new mReserva;
	$BuscarCancha = $m->BuscarCancha();
	if(isset($_POST['Hdesde']) and isset($_POST['Hhasta']) and isset($_POST['fecha_reserva'])){
		$Hdesde = "'" . $_POST['Hdesde']. "'";
		$Hhasta = "'" . $_POST['Hhasta'] . "'";
		$fecha_reserva = $_POST['fecha_reserva'];
		try{
			$BuscarReserva = $m->BuscarReserva($Hdesde, $Hhasta, $fecha_reserva, $_POST['idcancha']);
		} catch (Exception $e) {
    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    		}
	}
	if(isset($_POST['nombre']) and isset($_POST['adelanto']) and isset($_POST['idcancha']) and isset($_POST['idcategoria']) and isset($_POST['idcobro']) and isset($_POST['fecha_reserva']) and isset($_POST['Hdesde']) and isset($_POST['Hhasta'])){
		try{
			$CrearReserva = $m->CrearReserva();
		} catch (Exception $e) {
    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    		}
	}

	$v = new vReserva;
	$v->BuscarCancha = $BuscarCancha;
	if(isset($_POST['Hdesde']) and isset($_POST['Hhasta']) and isset($_POST['fecha_reserva'])){
		if(isset($BuscarReserva)){
			$v->BuscarReserva = $BuscarReserva;
		}
	}
	if(isset($_POST['nombre']) and isset($_POST['adelanto']) and isset($_POST['idcancha']) and isset($_POST['idcategoria']) and isset($_POST['idcobro']) and isset($_POST['fecha_reserva']) and isset($_POST['Hdesde']) and isset($_POST['Hhasta'])){
		if(isset($CrearReserva)){
			$v->CrearReserva = $CrearReserva;
		}
	}
	$v->render();
	/* try{
		
		} catch (Exception $e) {
    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    		}
		} */
 ?>