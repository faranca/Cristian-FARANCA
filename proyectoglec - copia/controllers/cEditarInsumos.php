<?php 
//estamos en controllers/cEditarInsumos.php

	require '../fw/fw.php';
	require '../models/mEditarInsumos.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	// Modifico insumo
	$m=new mEditarInsumos;
	if(isset($_POST['id']) && isset($_POST['nom']) and isset($_POST['stock']) and isset($_POST['precio']) and isset($_POST['iddeporte'])){
			$id=$_POST['id'];
			$stock=$_POST['stock'];
			$precio=$_POST['precio'];
			$iddeporte=$_POST['iddeporte'];
			$nom= "'".$_POST['nom']."'";
			$EditarInsumos=$m->EditarInsumos($nom, $id, $stock, $precio, $iddeporte);	
			header("location:./cListarInsumos.php");
	}

	// Obtengo insumo
	if(isset($_GET['id'])){
		$CargarInsumos=$m->CargarInsumos($_GET['id']);
		$v = new vEditarInsumos;
		$ListarDeportes=$m->ListarDeportes(); 
		$v->CargarInsumos=$CargarInsumos;
		$v->ListarDeportes=$ListarDeportes;
		$v->render();
	}

 ?>
