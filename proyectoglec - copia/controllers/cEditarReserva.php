<?php 
//estamos en controllers/cEditarReserva.php

	require '../fw/fw.php';
	require '../models/mEditarReserva.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}//$nombre, $dni, $telefono, $observacion, $id 
	
	$m=new mEditarReserva;
	if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['observacion']) && isset($_POST['dni'])){
			$nombre = "'".$_POST['nombre']."'";
			$dni = "'".$_POST['dni']."'";
			$telefono = "'".$_POST['telefono']."'";
			$observacion = "'".$_POST['observacion']."'";
			$EditarReserva=$m->EditarReserva($nombre, $dni, $telefono, $observacion, $_POST['id']);	
	}
	if(isset($_GET['id'])){
		$CargarReserva=$m->CargarReserva($_GET['id']); 
	}
	

	$v = new vEditarReserva;
	if(isset($_POST['id']) && isset($_POST['fecha']) && isset($_POST['fecha_baja']) && isset($_POST['idpersona']) && isset($_POST['idactividad'])){
			$v->EditarReserva=$EditarReserva;
	}
	if(isset($_GET['id'])){
		$v->CargarReserva=$CargarReserva; 
	}
	
	$v->render();

 ?>
