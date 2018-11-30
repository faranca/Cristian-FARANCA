<?php 
//estamos en controllers/cEditarNuevoaSocio.php

	require '../fw/fw.php';
	require '../models/mEditarSocio.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	

	// Guardo los datos del socio
	$m=new mEditarSocio;
	if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['ape']) && isset($_POST['nac']) && isset($_POST['dni']) && isset($_POST['user']) && isset($_POST['pass1']) && isset($_POST['mail'])){
			$id=$_POST['id'];
			$nom= $_POST['nom'];
			$ape= $_POST['ape'];
			$nac= "'".$_POST['nac']."'";
			$dni= $_POST['dni'];
			$user= $_POST['user'];
			$pass1= $_POST['pass1'];
			$mail= $_POST['mail'];
			$EditarSocio=$m->EditarSocio($nom, $ape,$nac,$dni,$user,$pass1,$mail,$id);	
			header("location:./cListaSocios.php");
	}

	// Obtengo los datos del socio
	if(isset($_GET['id'])){
		$CargarSocio=$m->CargarSocio($_GET['id']); 
		$v = new vEditarSocio;
		$v->CargarSocio=$CargarSocio; 
		$v->render();
	}

 ?>
