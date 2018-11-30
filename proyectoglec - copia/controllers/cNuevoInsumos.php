<?php 
//estamos en controllers/cNuevoDeporte.php

	require '../fw/fw.php';
	require '../models/mNuevoInsumos.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mNuevoInsumos;
	$v = new vNuevoInsumos;
	if(isset($_POST['nom']) and isset($_POST['stock']) and isset($_POST['precio']) and isset($_POST['iddeporte'])){
			$stock=$_POST['stock'];
			$precio=$_POST['precio'];
			$iddeporte=$_POST['iddeporte'];
			$nom= "'".$_POST['nom']."'";
			$NewInsumos=$m->NuevoInsumos($nom, $stock, $precio, $iddeporte);
			header("location:./cListarInsumos.php");	
	}
	$ListarDeportes=$m->ListarDeportes();
	$v->ListarDeportes=$ListarDeportes;
	$v->render();

 ?>