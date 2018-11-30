<?php 
//estamos en controllers/cEditarNuevoaEmpleado.php

	require '../fw/fw.php';
	require '../models/mEditarEmpleado.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	

	// Guardo los datos del empleado
	$m=new mEditarEmpleado;
	if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['ape']) && isset($_POST['nac']) && isset($_POST['dni']) && isset($_POST['user']) && isset($_POST['pass1']) && isset($_POST['mail'])){
			$id=$_POST['id'];
			$nom= $_POST['nom'];
			$ape= $_POST['ape'];
			$nac= "'".$_POST['nac']."'";
			$dni= $_POST['dni'];
			$user= $_POST['user'];
			$pass1= $_POST['pass1'];
			$mail= $_POST['mail'];
			$EditarEmpleado=$m->EditarEmpleado($nom, $ape,$nac,$dni,$user,$pass1,$mail,$id);
			header("location:./cListaEmpleados.php");	
	}

	// Obtengo los datos del empleado
	if(isset($_GET['id'])){
		$CargarEmpleado=$m->CargarEmpleado($_GET['id']); 
		$v = new vEditarEmpleado;
		$v->CargarEmpleado=$CargarEmpleado; 
		$v->render();
	}
	

 ?>