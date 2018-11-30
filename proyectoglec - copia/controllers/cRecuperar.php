<?php 
	require '../fw/fw.php';
	require '../models/mRecuperar.php';
	//require '../views/vCaja.php';
	
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	$m=new mRecuperar;
	if(isset($_GET['id'])){
		if($_GET['link'] == Empleados or $_GET['link'] == Socios){
			$RecuperarPersona=$m->RecuperarPersona($_GET['id']);
		}
		if($_GET['link'] == Insumos){
			$RecuperarInsumos=$m->RecuperarInsumos($_GET['id']);
		}
		if($_GET['link'] == Actividades){
			$RecuperarActividades=$m->RecuperarActividades($_GET['id']);
		}
		if($_GET['link'] == Canchas){
			$RecuperarCanchas=$m->RecuperarCanchas($_GET['id']);
		}
		if($_GET['link'] == Deportes){
			$RecuperarDeportes=$m->RecuperarDeportes($_GET['id']);
		}
	} else { header("location:./cHome.php"); }

	
	$v = new vRecuperar;
	if(isset($_GET['id'])){
		if($_GET['link'] == Empleados or $_GET['link'] == Socios){
			$v->RecuperarPersona = $RecuperarPersona;
		}
		if($_GET['link'] == Insumos){
			$v->RecuperarInsumos = $RecuperarInsumos;
		}
		if($_GET['link'] == Actividades){
			$v->RecuperarActividades = $RecuperarActividades;
		}
		if($_GET['link'] == Canchas){
			$v->RecuperarCanchas = $RecuperarCanchas;
		}
		if($_GET['link'] == Deportes){
			$v->RecuperarDeportes = $RecuperarDeportes;
		}
	}
	$v->render();
 ?>