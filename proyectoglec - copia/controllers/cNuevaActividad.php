<?php 
//estamos en controllers/cNuevaActividad.php

	require '../fw/fw.php';
	require '../models/mNuevaActividad.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mNuevaActividad;
	$dato= NULL;
	$v = new vNuevaActividad;
	if(isset($_POST['nom']) && isset($_POST['precio']) && isset($_POST['idcancha'])){
			$nom= "'".$_POST['nom']."'";
			$precio= $_POST['precio'];
			$idcancha= $_POST['idcancha'];
			$NewActividads=$m->NuevaActividad($nom, $precio, $idcancha);
			header("location:./cListarActividades.php");
	}
	
	$CargarCancha=$m->CargarCancha();
	$v->CargarCancha=$CargarCancha;
	$v->render();

 ?>
