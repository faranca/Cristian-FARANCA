<?php 
//estamos en controllers/cNuevaCancha.php

	require '../fw/fw.php';
	require '../models/mNuevaCancha.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mNuevaCancha;
	$dato= NULL;
	$v = new vNuevaCancha;
	if(isset($_POST['nom']) && isset($_POST['valor']) && isset($_POST['iddeporte'])){
			$nom= "'".$_POST['nom']."'";
			$valor= $_POST['valor'];
			$iddeporte= $_POST['iddeporte'];
			$NewCanchas=$m->NuevaCancha($nom, $valor, $iddeporte);
			header("location:./cListarCanchas.php");	
	}
	$CargarDeporte=$m->CargarDeporte();
	$v->CargarDeporte=$CargarDeporte;
	$v->render();

 ?>
