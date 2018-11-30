<?php
 
	require '../fw/fw.php';
	require '../views/vHome.php';
	

if(($_SESSION['login'] != "ok"))
{

	header ("location:../HTML/vLogin.php");
	exit();
}


	$v = new vHome;
	$v->render();
 ?>