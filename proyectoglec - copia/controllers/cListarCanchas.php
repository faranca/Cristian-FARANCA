<?php 
//estamos en controllers/cListarCanchas.php

	require '../fw/fw.php';
	require '../models/mListarCanchas.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mListarCanchas;
	$dato= NULL;
	if(isset($_GET['nom']))
	{
		$dato= "'%".$_GET['nom']."%'";
		$ListarCanchas=$m->ListarCanchas($dato);
	}
	else
	{
		$ListarCanchas=$m->ListaCanchas();
	}

	

	$v = new vListarCanchas;
	$v->ListarCanchas=$ListarCanchas;
	
	$v->render();

 ?>