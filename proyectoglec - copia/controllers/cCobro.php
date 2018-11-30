<?php 
	require '../fw/fw.php';
	require '../models/mCobro.php';
	//require '../views/vCaja.php';
	
	if(($_SESSION['login'] != "ok"))
	{

		header ("location:../HTML/vLogin.php");
		exit();
	}
	$m=new mCobro;
	$BuscarCajaA=$m->BuscarCajaAbierta();
	if(isset($_POST['TipoCobro']) and isset($_POST['Tipo']) and isset($_POST['Precio']) and isset($_POST['Descripcion']) 
						and isset($_POST['CantCuota']) and isset($_POST['idInscripcion']) and isset($_POST['Coutas_Pagas'])){
	if($_POST['TipoCobro']=="Cuota"){
		$Descripcion = $_POST['Descripcion'] ;
		$Coutas_Pagas = $_POST['Coutas_Pagas'];
		try{
			$CobrarCuota=$m->CobrarCuota($_POST['Tipo'], $_POST['Precio'],  $Descripcion, $_POST['CantCuota'], $_POST['idInscripcion'], $Coutas_Pagas);
			} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
	}}//sacar if cuando termine reservas
	if(isset($_POST['TipoCobro']) and isset($_POST['Nombre']) and isset($_POST['Fecha']) and isset($_POST['Hora_desde']) and isset($_POST['Hora_hasta']) and isset($_POST['DNI']) and isset($_POST['idCancha']) and isset($_POST['Telefono']) and isset($_POST['Observacion']) and isset($_POST['Tipo']) and isset($_POST['Senia'])){ 
		if($_POST['TipoCobro']=="Reserva"){ 
			$Nombre = "'" . $_POST['Nombre'] . "'";
			$Fecha = "'" . $_POST['Fecha'] . "'"; 
			$Hora_desde = "'" . $_POST['Hora_desde'] . "'";
			$Hora_hasta = "'" . $_POST['Hora_hasta'] . "'";
			$DNI = $_POST['DNI'];
			$Telefono = "'" . $_POST['Telefono'] . "'";
			$Observacion = "'" . $_POST['Observacion'] . "'";
			$idCancha = $_POST['idCancha'];
			$TipoCobro = $_POST['TipoCobro'] . " ". $_POST['Nombre'] . " " . $_POST['Fecha'] . " " . $_POST['Hora_desde'];
			try{
				$CobrarReserva = $m->CobrarReserva($_POST['Tipo'], $_POST['Senia'], $TipoCobro, $Nombre, $DNI, $idCancha, $Fecha, $Hora_desde, $Hora_hasta, $Telefono, $Observacion);
				} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
			try{
				$InsumoDisponible1 = $m->InsumoDisponible($idCancha, $Fecha, $Hora_desde, $Hora_hasta);
				} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
			
	}}

	if(isset($_GET['TipoCobro']) and isset($_GET['idReserva']) and isset($_GET['Tipo']) and isset($_GET['Importe']) and isset($_GET['Descripcion'])){
		if($_GET['TipoCobro']=="RestoReserva"){ 
			try{
				$CobrarResto = $m->CobrarResto($_GET['Tipo'], $_GET['Importe'], $_GET['Descripcion'],$_GET['idReserva']);
				} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
	}}

	if(isset($_POST['TipoCobro']) and isset($_POST['Tipo']) and isset($_POST['idSocio']) and isset($_POST['idActividad']) and isset($_POST['Descripcion'])){
		if($_POST['TipoCobro']=="Inscripcion"){ 
			try{
				$CobrarInscripcion = $m->CobrarInscripcion($_POST['Tipo'], $_POST['idSocio'], $_POST['idActividad'], $_POST['Descripcion']);
				} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
	}}

	$getPagos = $m->getPagos();
	$getCPB = $m->getCPB();
	if(isset($_POST['TipoCobro']) and isset($_POST['cantidad']) and isset($_POST['idInsumo'])){
		if($_POST['TipoCobro']=="ReservaInsumo"){ 
			try{
				$CargarInsumoUltimaReserva = $m->CargarInsumoUltimaReserva($_POST['idInsumo'],$_POST['cantidad']);
				} catch (Exception $e) {
			    		echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			    		}
	}}
	
	
	

	$v = new vCobro;
	$v->BuscarCajaA = $BuscarCajaA;
	if(isset($_POST['TipoCobro']) and isset($_POST['Tipo']) and isset($_POST['Precio']) and isset($_POST['Descripcion']) 
							and isset($_POST['CantCuota']) and isset($_POST['idInscripcion']) and isset($_POST['Coutas_Pagas'])){
	if($_POST['TipoCobro']=="Cuota"){
		if(isset($CobrarCuota)) $v->CobrarCuota = $CobrarCuota;
	}}
	if(isset($_POST['TipoCobro']) and isset($_POST['nombre']) and isset($_POST['fecha']) and isset($_POST['hora_desde']) and isset($_POST['hora_hasta']) and isset($_POST['dni']) and isset($_POST['idcancha']) and isset($_POST['telefono']) and isset($_POST['observacion']) and isset($_POST['Tipo']) and isset($_POST['Senia'])){
		if($_POST['TipoCobro']=="Reserva"){ 
			if(isset($CobrarReserva)) $v->CobrarReserva = $CobrarReserva;
			
	}}
	if(isset($InsumoDisponible1)){$v->InsumoDisponible = $InsumoDisponible1;}
	
	if(isset($_GET['TipoCobro']) and isset($_GET['idReserva']) and isset($_GET['Tipo']) and isset($_GET['Importe']) and isset($_GET['Descripcion'])){
		if($_GET['TipoCobro']=="RestoReserva"){ 
			if(isset($CobrarResto)) $v->CobrarResto = $CobrarResto;
	}}

	if(isset($_POST['TipoCobro']) and isset($_POST['Tipo']) and isset($_POST['idSocio']) and isset($_POST['idActividad']) and isset($_POST['Descripcion'])){
		if($_POST['TipoCobro']=="Inscripcion"){ 
			if(isset($CobrarInscripcion)) $v->CobrarInscripcion = $CobrarInscripcion;
	}}

	$v->getPagos = $getPagos;
	$v->getCPB = $getCPB;
	if(isset($_POST['TipoCobro']) and isset($_POST['cantidad']) and isset($_POST['idInsumo'])){
		if($_POST['TipoCobro']=="ReservaInsumo"){ 
			if(isset($CargarInsumoUltimaReserva)) $v->CargarInsumoUltimaReserva = $CargarInsumoUltimaReserva;
	}}

	$v->render();
 ?>