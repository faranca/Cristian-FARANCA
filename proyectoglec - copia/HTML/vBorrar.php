<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Cierre de caja</title>
</head>
<body>
<div class="bg">
<div id="menu">
	<?php include 'vMenu.php' ?>
</div>
<div id="contenido">
<?php 
	if(isset($_GET['link'])){
									if($_GET['link'] == "Empleados"){
									header("location:./cListaEmpleados.php");
									}
									if($_GET['link'] == "Socios"){
									header("location:./cListaSocios.php");
									}
									if($_GET['link'] == "Insumos"){
									header("location:./cListarInsumos.php");
									}
									if($_GET['link'] == "Actividades"){
									header("location:./cListarActividades.php");
									}
									if($_GET['link'] == "Canchas"){
									header("location:./cListarCanchas.php");
									}
									if($_GET['link'] == "Deportes"){
									header("location:./cListarDeportes.php");
									}
									if($_GET['link'] == "Inscripcion"){
									header("location:./cListarInscripcion.php");
									}
									if($_GET['link'] == "Reserva"){
									header("location:./cRestoReserva.php");
									}
							}
							?>
							<a>Error</a>
</div>
</div>
</body>
</html>