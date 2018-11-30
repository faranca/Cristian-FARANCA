<?php 
//estamos en controllers/cListarDeportes.php

	require '../fw/fw.php';
	require '../models/mListarDeporte.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mListarDeportes;
	$dato= NULL;
	if(isset($_GET['nom']))
	{
		$dato= "'%".$_GET['nom']."%'";
		$ListarDeportes=$m->ListarDeportes($dato);
	}
	else
	{
		$ListarDeportes=$m->ListaDeportes();
	}

	

	$v = new vListarDeportes;
	$v->ListarDeportes=$ListarDeportes;
	
	$v->render();

 ?>