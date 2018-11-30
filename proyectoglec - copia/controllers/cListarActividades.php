<?php 
//estamos en controllers/cListarActividades.php

	require '../fw/fw.php';
	require '../models/mListarActividades.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mListarActividades;
	$dato= NULL;
	if(isset($_GET['nom']))
	{
		$dato= "'%".$_GET['nom']."%'";
		$ListarActividades=$m->ListarActividades($dato);
	}
	else
	{
		$ListarActividades=$m->ListaActividades();
	}

	

	$v = new vListarActividades;
	$v->ListarActividades=$ListarActividades;
	
	$v->render();

 ?>