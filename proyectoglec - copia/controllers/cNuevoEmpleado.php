<?php 
//estamos en controllers/cNuevoaEmpleado.php

	require '../fw/fw.php';
	require '../models/mNuevoEmpleado.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mNuevoEmpleado;
	$dato= NULL;
	$v = new vNuevoEmpleado;
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
			$NewEmpleados=$m->NuevoEmpleado($nom, $ape,$nac,$dni,$user,$pass1,$mail);
			$v->NewEmpleados=$NewEmpleados;
			header("location:./cListaEmpleados.php");
		}
	}
	$v->render();

 ?>