<?php
	// controllers/login.php

	require '../fw/fw.php';
	require '../models/mLogin.php';
	require '../views/vlogin.php';


	if(isset($_POST['user'],$_POST['pass'])){
	
		$usuario = (new mLogin)->validarUsuario($_POST['user']);
		if($usuario == TRUE){
			$passx =$usuario['clave'];
		}

		if($passx === $_POST['pass']){
			Session_start();
			$_SESSION['login'] = "ok";
			$_SESSION['usuario'] = $usuario['nombre'];
			header ("location:../controllers/cHome.php");

		}else{
			header ("location:../controllers/cLogin.php");
		}

		$v = new vlogin;
		$v->render();

	}else{
		$v = new vlogin;
		$v->render();
	}



?> 