<?php 
	require '../fw/fw.php';
	require '../models/mRetiros.php';
	//require '../views/vCaja.php';
	
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	$m=new mRetiros;
	$CalcularCaja = $m->CalcularCaja();
	if(isset($_POST['monto']) and isset($_POST['descripcion'])){
		if($_POST['monto'] < $_POST['monto_final'] ){
			try{
			$RegistrarRetiros=$m->RegistrarRetiros($_POST['monto'], $_POST['descripcion']);
			header("location:./cCaja.php");
			} catch (Exception $e) {
    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    		}
		} else {
			$RegistrarRetiros=0;
		}

	}

	$v = new vRetiros;
	$v->CalcularCaja =$CalcularCaja;
	if(isset($_POST['monto'])and isset($_POST['descripcion'])){
		if(isset($RegistrarRetiros)) $v->RegistrarRetiros = $RegistrarRetiros;
	}
	$v->render();
 ?>