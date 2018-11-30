<?php 
	require '../fw/fw.php';
	require '../models/mBorrar.php';
	//require '../views/vCaja.php';
	
	if(($_SESSION['login'] != "ok"))
	{

		header ("location:../HTML/vLogin.php");
		exit();
	}
	
	$m=new mBorrar;
	if(isset($_GET['id'])){
		if($_GET['link'] == "Empleados" or $_GET['link'] == "Socios"){
			try{
				$BorrarPersona=$m->BorrarPersona($_GET['id']);
				} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
		}
		if($_GET['link'] == "Insumos"){
			try{
				$BorrarInsumos=$m->BorrarInsumos($_GET['id']);
				} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
		}
		if($_GET['link'] == "Actividades"){
			try{
				$BorrarActividades=$m->BorrarActividades($_GET['id']);
				} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
		}
		if($_GET['link'] == "Canchas"){
			try{
				$BorrarCanchas=$m->BorrarCanchas($_GET['id']);
				} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
		}
		if($_GET['link'] == "Deportes"){
			try{
				$BorrarDeportes=$m->BorrarDeportes($_GET['id']);
				} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
		}
		if($_GET['link'] == "Inscripcion"){
			try{
				$BorrarInscripcion=$m->BorrarInscripcion($_GET['id']);
				} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
		}
		if($_GET['link'] == "Reserva"){
			try{
				$BorrarReserva=$m->BorrarReserva($_GET['id']);
				} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
		}
	} else { header("location:./cHome.php"); }

	$v = new vBorrar;
	if(isset($_GET['id'])){
		if($_GET['link'] == "Empleados" or $_GET['link'] == "Socios"){
			if(isset($BorrarPersona)) $v->BorrarPersona = $BorrarPersona;
		}
		if($_GET['link'] == "Insumos"){
			if(isset($BorrarInsumos)) $v->BorrarInsumos = $BorrarInsumos;
		}
		if($_GET['link'] == "Actividades"){
			if(isset($BorrarActividades)) $v->BorrarActividades = $BorrarActividades;
		}
		if($_GET['link'] == "Canchas"){
			if(isset($BorrarCanchas)) $v->BorrarCanchas = $BorrarCanchas;
		}
		if($_GET['link'] == "Deportes"){
			if(isset($BorrarDeportes)) $v->BorrarDeportes = $BorrarDeportes;
		}
		if($_GET['link'] == "Inscripcion"){
			if(isset($BorrarInscripcion)) $v->BorrarInscripcion = $BorrarInscripcion;
		}
		if($_GET['link'] == "Reserva"){
			if(isset($BorrarReserva)) $v->BorrarReserva = $BorrarReserva;
		}
	}
	$v->render();
 ?>