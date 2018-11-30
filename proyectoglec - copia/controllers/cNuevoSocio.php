<?php 
//estamos en controllers/cNuevoaSocio.php

	require '../fw/fw.php';
	require '../models/mNuevoSocio.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mNuevoSocio;
	$dato= NULL;
	$v = new vNuevoSocio;
	if(isset($_POST['nom']) && isset($_POST['ape']) && isset($_POST['nac']) &&isset($_POST['dni']) &&isset($_POST['user']) && isset($_POST['pass1']) && isset($_POST['pass2']) &&isset($_POST['mail']))
	{
		$a = $_POST['pass1'];
		$b = $_POST['pass2'];
		if($a==$b){
			$nom= "'".$_POST['nom']."'";
			$ape= "'".$_POST['ape']."'";
			$nac= "'".$_POST['nac']."'";
			$dni= "'".$_POST['dni']."'";
			$user= "'".$_POST['user']."'";
			$pass1= "'".$_POST['pass1']."'";
			$mail= "'".$_POST['mail']."'";
			$NewSocios=$m->NuevoSocio($nom, $ape,$nac,$dni,$user,$pass1,$mail);
			$v->NewSocios=$NewSocios;
			header("location:./cListaSocios.php");
		}
	}
	$v->render();

 ?>
