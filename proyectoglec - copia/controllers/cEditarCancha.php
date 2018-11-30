<?php 
//estamos en controllers/cEditarCancha.php

	require '../fw/fw.php';
	require '../models/mEditarCanchas.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mEditarCancha;

	// Guardo la cancha
	if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['valor']) && isset($_POST['iddeporte'])){
			$id=$_POST['id'];
			$nom= "'".$_POST['nom']."'";
			$valor= $_POST['valor'];
			$iddeporte= $_POST['iddeporte'];
			$EditarCancha=$m->EditarCancha($nom, $valor,$iddeporte,$id);	
			header("location:./cListarCanchas.php");
	}

	// Obtengo la cancha
	if(isset($_GET['id'])){
		$CargarCancha=$m->CargarCancha($_GET['id']); 
		$CargarDeporte=$m->CargarDeporte();
		$v = new vEditarCancha;
		$v->CargarCancha=$CargarCancha; 
		$v->CargarDeporte=$CargarDeporte;
		$v->render();
	}

 ?>
