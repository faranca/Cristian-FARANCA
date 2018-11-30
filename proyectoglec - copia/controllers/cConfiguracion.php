<?php 

	require '../fw/fw.php';
	require '../models/mConfiguracion.php';

	$Configuracion = '';
	$exportaDB = '';
	$m=new mConfiguracion;
	if(isset($_GET['opcion'])){
		switch ($_GET['opcion']) {
			case '1':
				$Configuracion=$m->definirAccesos();
				break;
			case '2':
				if(isset($_GET['ruta'])){
					$exportaDB=$m->exportarBackup($_GET['ruta']);				
				}else{
					$exportaDB=$m->exportarBackup("C:/");
				}
				break;
			case '3':
				if(isset($_GET['ruta'])){
					$Configuracion=$m->importarBackup($_GET['ruta']);
				}
				break;
			case '4':
				$Configuracion=$m->depurarMaestros();
				break;
			case '5':
				$Configuracion=$m->depurarMovimientos();
				break;
		}

		}else{
			$Configuracion = $m;
		}

	$v = new vConfiguracion;
	$v->exportaDB = $exportaDB;
	$v->Configuracion = $Configuracion;
	$v->render();
 ?>