<?php 
//estamos en controllers/cEditarActividad.php

	require '../fw/fw.php';
	require '../models/mEditarActividad.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mEditarActividad;
	// Guardo cambios actividad
	if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['precio']) && isset($_POST['idcancha'])){
			$id=$_POST['id'];
			$nom= "'".$_POST['nom']."'";
			$precio= $_POST['precio'];
			$idcancha= $_POST['idcancha'];
			$EditarActividad=$m->EditarActividad($nom, $precio, $idcancha, $id);	
			header("location:./cListarActividades.php");
	}

	// Obtengo actividad
	if(isset($_GET['id'])){
		$CargarActividad=$m->CargarActividad($_GET['id']); 
		$v = new vEditarActividad;
		$CargarCancha=$m->CargarCancha();
		$v->CargarActividad=$CargarActividad; 
		$v->CargarCancha=$CargarCancha;
		$v->render();
	}


 ?>
