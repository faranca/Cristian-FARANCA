<?php 
//estamos en controllers/cListaInscripcion.php

	require '../fw/fw.php';
	require '../models/mListarInscripcion.php';
		
	//if($_SESSION['login']=='0'){
	//	header("location:login.html");
	//}
	
	$m=new mListarInscripcion;
	if(isset($_GET['txtSocio'])){
		if(isset($_GET['idsocio'])){
					$ListarInscNoEsta=$m->ListarInscNoEsta($_GET['idsocio']);
					$ListarInscEsta=$m->ListarInscEsta($_GET['idsocio']);
		}  else {
			$dato= $_GET['txtSocio'];
			$LisSocios=$m->ListaSocios($dato);
			
		}
	}
	



	$v = new vListarInscripcion;
		if(isset($_GET['txtSocio'])){
			if(isset($_GET['idsocio'])){
				$v->ListarInscNoEsta = $ListarInscNoEsta;
				$v->ListarInscEsta = $ListarInscEsta;
			}  else {
				$v->LisSocios=$LisSocios;
			}
		}
	
	$v->render();
 ?>