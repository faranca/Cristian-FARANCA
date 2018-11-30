<?php 
//estamos en controllers/cListaEmpleados.php

	require '../fw/fw.php';
	require '../models/mListaEmpleados.php';
	

	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mListaEmpleados;
	$dato= NULL;
	if(isset($_GET['nom']))
	{
		$dato= $_GET['nom'];
		$LisEmpleados=$m->ListaEmpleados($dato);
	}
	else
	{
		$LisEmpleados=$m->ListaEmpleados($dato);
	}

	

	$v = new vListaEmpleados;
	$v->LisEmpleados=$LisEmpleados;
	
	$v->render();

 ?>