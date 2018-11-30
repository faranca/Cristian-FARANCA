<?php 
//estamos en controllers/cListaSocios.php

	require '../fw/fw.php';
	require '../models/mListaSocios.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mListaSocios;
	$dato= NULL;
	if(isset($_GET['nom']))
	{
		$dato= $_GET['nom'];
		$LisSocios=$m->ListaSocios($dato);
	}
	else
	{
		$LisSocios=$m->ListaSocios($dato);
	}

	

	$v = new vListaSocios;
	$v->LisSocios=$LisSocios;
	
	$v->render();

 ?>