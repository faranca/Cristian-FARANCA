<?php 
//estamos en controllers/cEditarInscripcion.php

	require '../fw/fw.php';
	require '../models/mEditarInscripcion.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mEditarInscripcion;
	if(isset($_POST['id']) && isset($_POST['fecha']) && isset($_POST['fecha_baja']) && isset($_POST['idpersona']) && isset($_POST['idactividad'])){
			$id=$_POST['id'];
			$fecha= "'".$_POST['fecha']."'";
			$fecha_baja= "'".$_POST['fecha_baja']."'";
			$nom= $_POST['idpersona'];
			$ape= $_POST['idactividad'];
			$EditarInscripcion=$m->EditarInscripcion($nom, $fecha, $fecha_baja,$idpersona,$idactividad);	
	}
	if(isset($_GET['id'])){
		$CargarInscripcion=$m->CargarInscripcion($_GET['id']); 
	}
	$CargarActividad = $m->CargarActividad();

	$v = new vEditarInscripcion;
	if(isset($_POST['id']) && isset($_POST['fecha']) && isset($_POST['fecha_baja']) && isset($_POST['idpersona']) && isset($_POST['idactividad'])){
			$v->EditarInscripcion=$EditarInscripcion;
	}
	if(isset($_GET['id'])){
		$v->CargarInscripcion=$CargarInscripcion; 
	}
	$v->CargarActividad=$CargarActividad; 
	$v->render();

 ?>
