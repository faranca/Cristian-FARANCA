<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title></title>
</head>
<body>
<div class="bg">
<div id="menu">
	<?php include '../HTML/vMenu.php' ?>
</div>
<div id="contenido">
	<section>
		<article>
			<label>Realizar copia de seguridad del sistema</label><br>
			<button onclick="exportaBack()">Ir</button><br>
			<span class="txtExporta"><?php
							if($this->exportaDB != ""){
								echo $this->exportaDB;
							}
							?>
			</span>
		</article>
		<article>
			<label>Restaurar copia de seguridad del sistema</label><br>
			<input type="file" id="importa">
			<button onclick="importaBack()">Ir</button>
		</article>
	</section>
</div>
</div>
<script type="text/javascript">
	function depurarMaestros(){
		if(confirm("Esta seguro que desea depurar los datos maestros?")){
			window.location.href='./cConfiguracion.php?opcion=4';
			alert("Datos depurados");
		}else{
			alert("Accion cancelada");
		}
	}
	function depurarMovimientos(){
		if(confirm("Esta seguro que desea depurar los movimientos?")){
			window.location.href='./cConfiguracion.php?opcion=5';
			alert("Datos depurados");
		}else{
			alert("Accion cancelada");
		}
	}

	function exportaBack(){
			window.location.href='./cConfiguracion.php?opcion=2&ruta=';
	}

	function importaBack(){
	var txtRuta= document.getElementById('importa');
		if(txtRuta.text != ""){
			window.location.href='./cConfiguracion.php?opcion=3&ruta='+txtRuta.value+'.sql';
		}	
	}
</script>
</body>
</html>