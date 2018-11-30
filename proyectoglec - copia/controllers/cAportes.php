<?php 
	require '../fw/fw.php';
	require '../models/mAportes.php';
	//require '../views/vCaja.php';
	
	if(($_SESSION['login'] != "ok"))
	{

		header ("location:../HTML/vLogin.php");
		exit();
	}
	
	$m=new mAportes;
	$CalcularCaja = $m->CalcularCaja();
	if(isset($_POST['monto']) and isset($_POST['descripcion'])){
				try{
					$RegistrarAportes=$m->RegistrarAportes($_POST['monto'], $_POST['descripcion']);
					header("location:./cCaja.php");
				} catch (Exception $e) {
		    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		    		}
		} else {
				$RegistrarAportes=0;		
	}

	$v = new vAportes;
	$v->CalcularCaja =$CalcularCaja;
	if(isset($_POST['monto'])and isset($_POST['descripcion'])){
		if(isset($RegistrarAportes)) $v->RegistrarAportes = $RegistrarAportes;
	}
	$v->render();
 ?>