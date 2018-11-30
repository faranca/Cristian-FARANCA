<?php 
	/*if(isset($_POST['tipo']) and $_POST['nombre']) and isset($_POST['senia'])){
			$idreserva = $this->getUltimaReserva;
			header("location:./cCobrar.php?TipoCobro=Reserva&tipo=<?= $_POST['tipo'] ?>&idreserva=<?= $idreserva ?>&senia=<?= $_POST['senia'] ?>");  /*enviaria id reserva, en la pag destino crea el ingreso y depues ingreso por reserva*/
	//}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Reservas</title>
</head>
<body>
<div class="bg">
	<div id="menu">
		<?php include 'vMenu.php' ?>
	</div>
<div id="contenido">
	<form id = "caja_nuevareserva" action="./cCobro.php" method="POST">
		<div class = "contenedor">
			<div class = "titulo_form">
				<a class="tituloa">Reservas</a>
			</div>
			<div class = "contenido_form">
				<fieldset class="nueva_reserva">
					<h3>Nueva</h3> <!-- CREAR IF CREATE O UPDATE -->
					<input type="text" name="Nombre" placeholder="Nombre y Apellido"  required>
					<input type="text" name="DNI" placeholder="DNI"  required>
					<input type="date" name="Fecha" value="<?= $_POST['fecha'] ?>" readonly>
					<input type="time" name="Hora_desde" value="<?= $_POST['Hinicio'] ?>" readonly>
					<input type="time" name="Hora_hasta" value="<?= $_POST['Hfin'] ?>" readonly>
					<input type="hidden" name="idCancha" value="<?= $_POST['idcancha'] ?>">
					<input type="hidden" name="TipoCobro" value="Reserva">
					<input type="number" name="Senia" placeholder="Se&ntilde;a" min="100" required>
					<select name="Tipo" required>
							<option value='A'>Factura A</option>
  							<option value='B'>Factura B</option>
  							<option value='C'>Factura C</option>
  						</select>
					<input type="text" name="Observacion" placeholder="observacion">
					<input type="text" name="Telefono" placeholder="telefono">
				</fieldset>
			</div>
			<div class="botones_accion_form">
				<input class="primerbotoncaja" type="submit" name="nueva_reserva" class="boton_OK" value="Crear Reserva">
				<button type="button" class="boton_Cancelar" onclick="window.location.href='cReserva.php'">Volver</button>
			</div>
		</div>
	</form>
</div>
</div>
</body>
</html>