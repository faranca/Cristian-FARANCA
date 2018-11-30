<?php 
//estamos en controllers/cListarInsumos.php

	require '../fw/fw.php';
	require '../models/mListarInsumos.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mListarInsumos;
	$dato= NULL;
	if(isset($_GET['nom']))
	{
		$dato= "'%".$_GET['nom']."%'";
		$ListarInsumos=$m->ListarInsumos($dato);
	}
	else
	{
		$ListarInsumos=$m->ListaInsumos();
	}

	

	$v = new vListarInsumos;
	$v->ListarInsumos=$ListarInsumos;
	
	$v->render();

 ?>