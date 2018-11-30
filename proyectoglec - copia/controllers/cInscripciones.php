<?php 
	require '../fw/fw.php';
	require '../views/vInscripciones.php';
	
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	$v = new vInscripciones;
	$v->render();
 ?>