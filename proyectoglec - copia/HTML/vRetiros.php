<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Retiros de caja</title>
</head>
<body>
	<?php if(isset($_POST['monto']) and isset($_POST['monto_final'])){ 
		if($_POST['monto'] >= $_POST['monto_final']){ ?>
			<script>alert('ERROR: El monto que intenta retirar es mayor al que posee');</script>
	<?php } } ?>
<div class="bg">
<div id="menu">
	<?php include 'vMenu.php' ?>
</div>
<div id="contenido">
	<form id="caja_retiros" action="" method="POST">
		<div class = "contenedor">
			<div class = "titulo_form">
				<a class="tituloa">Retiros de caja</a>
			</div>
			<div class = "contenido_form">
				<fieldset class="nueva_reserva">
					<?php foreach($this->CalcularCaja as $e){ 
						$monto_final= $e["Suma"] + $e["Inicio"] - $e["Resta"];?>
						<label class="saldo">Saldo actual: $ <?= $monto_final ?></label>
					<?php } ?>
					
					<input type="hidden" name="monto_final" value="<?= $monto_final ?>">
					<input type="number" name="monto" placeholder="Importe" step="0.1" required>
					<input type="text" name="descripcion" placeholder="Detalle" required>
				</fieldset>
			</div>
			<div class="botones_accion_form">
				<button class="primerbotoncaja" type="submit""> Nuevo Retiro </button>
				<button type="button" class="boton_Cancelar" onclick="window.location.href='cCaja.php'">Volver</button>
			</div>
		</div>
	</form>
</div>
</div>
</body>
</html>