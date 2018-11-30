<?php 
	require '../fw/fw.php';
	require '../models/mHorarioActividad.php';
	require '../models/mListarCanchas.php';

	// Obtengo el listado de canchas disponibles
	$m=new mListarCanchas;	
	$canchas = $m->getCanchas();
	$v = new vHorarioActividad;
	$v->canchas = $canchas;

	// Obtengo los datos de la actividad
	$m1=new mHorarioActividad;
	if(isset($_GET['idactividad'])){
		$horarios = $m1->getHorarioActividadById($_GET['idactividad']);
		$v->idActividad = $_GET['idactividad'];
		$v->horarios=$horarios; 
	}

	// Guardo el nuevo horario
	if(isset($_POST['nuevo'])){
		// guardo
		$horaini= $_POST['Hdesde'];
		$horahasta= $_POST['Hhasta'];
		$dia= $_POST['dia'];
		$idactividad = $_POST['idactividad'];
		$nuevo = $m1->setNuevoHorario($idactividad,$horaini,$horahasta,$dia);
		// y recargo
		$horarios = $m1->getHorarioActividadById($_GET['idactividad']);
		$v->idActividad =$idactividad;
		$v->horarios=$horarios;
	}

	// Borro los datos
	if(isset($_GET['idhorario'])){
		$idactividad = $_GET['idactividad'];
		$m1->delHorarioActividadById($idactividad,$_GET['idhorario']);
		$horarios = $m1->getHorarioActividadById($_GET['idactividad']);
		$v->idActividad =$idactividad;
		$v->horarios=$horarios; 
	}

	$v->render();
 ?>