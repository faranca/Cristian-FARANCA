<?php 
//estamos en controllers/cNuevoDeporte.php

	require '../fw/fw.php';
	require '../models/mNuevoDeporte.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mNuevoDeporte;
	$dato= NULL;
	$v = new vNuevoDeportes;
	if(isset($_POST['nom'])){
			$nom= "'".$_POST['nom']."'";
			$NewDeportes=$m->NuevoDeporte($nom);
			header("location:./cListarDeportes.php");
	}
	$v->render();

 ?>