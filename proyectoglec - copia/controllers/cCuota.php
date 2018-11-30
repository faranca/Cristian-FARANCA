<?php 
	require '../fw/fw.php';
	require '../models/mCuota.php';
	//require '../views/vCaja.php';
	
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	$m=new mCuota;
	if(isset($_GET['txtSocio'])){
		if(isset($_GET['idsocio'])){
			if(isset($_GET['idinscripcion'])){
				$BuscarActividadPaga=$m->BuscarActividadPaga($_GET['idinscripcion']);
				if(isset($_GET['baja'])){
					$BuscarActividadDebe=$m->BuscarActividadDebe1($_GET['idinscripcion']);
				} else {
					$BuscarActividadDebe=$m->BuscarActividadDebe($_GET['idinscripcion']);
				}
				if(isset($_GET['idactividad'])){
					try{
						$BuscarActividadSocio1=$m->BuscarActividadSocio1($_GET['idactividad']);
					} catch (Exception $e) {
				    	echo 'Excepción capturada: ',  $e->getMessage(), "\n";
				    	}
					
					}
			} else {
				try{
					$BuscarActividadSocio=$m->BuscarActividadSocio($_GET['idsocio']);
				} catch (Exception $e) {
			    	echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    	}
		} }  else {
		$dato= "'%" . $_GET['txtSocio'] . "%'";
			$BuscarSocios=$m->BuscarSocio($dato);
		}}
	

	//$CalculaCaja=$m->CalcularCaja();
	//$BuscarMovimientos1=$m->BuscarMovimientosCaja1();
	//$BuscarMovimientos2=$m->BuscarMovimientosCaja2();
	//$BuscarCajaA=$m->BuscarCajaAbierta();

	$v = new vCuotas;
		if(isset($_GET['txtSocio'])){
			if(isset($_GET['idsocio'])){
				if(isset($_GET['idinscripcion'])){
					if(isset($BuscarActividadPaga)) $v->BuscarActividadPaga = $BuscarActividadPaga;
					if(isset($BuscarActividadDebe)) $v->BuscarActividadDebe = $BuscarActividadDebe;
					if(isset($_GET['idactividad'])){
						if(isset($BuscarActividadSocio1)) $v->BuscarActividadSocio1 = $BuscarActividadSocio1;
				}} else {
				if(isset($BuscarActividadSocio)) $v->BuscarActividadSocio = $BuscarActividadSocio;
		} }  else {
		if(isset($BuscarSocios)) $v->BuscarSocio = $BuscarSocios;
		}}
	
	//$v->BuscarMovimientos1 = $BuscarMovimientos1;
	//$v->BuscarMovimientos2 = $BuscarMovimientos2;
	//$v->BuscarCajaA=$BuscarCajaA;
	$v->render();
 ?>