<?php 
	require '../fw/fw.php';
	require '../models/mCaja.php';

	if(($_SESSION['login'] != "ok"))
	{

		header ("location:../HTML/vLogin.php");
		exit();
	}


	$m=new mCaja;
	$BuscarMovimientos = $m->BuscarMovimientos();
	if(isset($_GET['monto'])){
		$monto=$_GET['monto'];
		if($monto==""){
			$monto='0';
		}

		try{
			$AbrirCaja = $m->AbrirCaja($monto);
			header("location:./cCaja.php");
		} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
	}
	$BuscarCajaA=$m->BuscarCajaAbierta();
	$BuscarMovimientos = $m->BuscarMovimientos();
	$CalculaCaja= $m->CalcularCaja();

	$v = new vCajas;
	if(isset($_GET['monto'])){
		if(isset($Cierrecaja)) $v->AbrirCaja = $AbrirCaja;
	}
	$v->BuscarCajaA=$BuscarCajaA;
	$v->BuscarMovimientos = $BuscarMovimientos;
	$v->CalculaCaja = $CalculaCaja;
	$v->render();
 ?>