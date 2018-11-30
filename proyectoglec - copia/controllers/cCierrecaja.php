<?php 
	require '../fw/fw.php';
	require '../models/mCierrecaja.php';
	//require '../views/vCaja.php';
	
	if(($_SESSION['login'] != "ok"))
	{

		header ("location:../HTML/vLogin.php");
		exit();
	}

	$m=new mCierrecaja;
	$Cierrecaja=$m->Cierrecaja($_GET['monto_final']);
	

	$v = new vCierrecaja;
	$v->Cierrecaja = $Cierrecaja;
	$v->render();
 ?>