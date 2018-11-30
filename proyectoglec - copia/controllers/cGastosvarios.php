<?php 
	require '../fw/fw.php';
	require '../models/mGastosvarios.php';
	//require '../views/vCaja.php';
	
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	$m=new mGastosvarios;
	$CalcularCaja = $m->CalcularCaja();
	if(isset($_POST['monto']) and isset($_POST['descripcion'])){
		if($_POST['monto'] < $_POST['monto_final'] ){
			try{
				$RegistrarGastosvarios=$m->RegistrarGastosvarios($_POST['monto'], $_POST['descripcion']);
			header("location:./cCaja.php");
			} catch (Exception $e) {
    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    		}
		} else {
			$RegistrarGastosvarios=0;
		}

	}

	$v = new vGastosvarios;
	$v->CalcularCaja =$CalcularCaja;
	if(isset($_POST['monto'])and isset($_POST['descripcion'])){
		if(isset($RegistrarGastosvarios)) $v->RegistrarGastosvarios = $RegistrarGastosvarios;
	}
	$v->render();
 ?>