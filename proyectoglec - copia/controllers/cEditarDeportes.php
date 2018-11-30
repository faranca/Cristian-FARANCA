<?php 
//estamos en controllers/cEditarDeporte.php

	require '../fw/fw.php';
	require '../models/mEditarDeporte.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mEditarDeporte;
	// Guardo las modificaciones
	if(isset($_POST['id']) && isset($_POST['nom'])){
			$id=$_POST['id'];
			$nom= "'".$_POST['nom']."'";
			$EditarDeporte=$m->EditarDeporte($nom, $id);	
			header("location:./cListarDeportes.php");
	}

	// Cargo los datos
	if(isset($_GET['id'])){
		$CargarDeporte=$m->CargarDeporte($_GET['id']); 
		$v = new vEditarDeportes;
		$v->CargarDeporte=$CargarDeporte; 
			$v->render();
	}



 ?>
