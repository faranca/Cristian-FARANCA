<?php 
	require '../fw/fw.php';
	require '../models/mRestoReserva.php';
	//require '../views/vCaja.php';
	
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	$m=new mRestoReserva;
	$BuscarDebedeReserva=$m->BuscarDebedeReserva();
	

	$v = new vRestoReserva;
	$v->BuscarDebedeReserva = $BuscarDebedeReserva;
	$v->render();
 ?>