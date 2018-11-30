<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Aportes de caja</title>
</head>
<body>
<div class="bg">
<div id="menu">
	<?php include 'vMenu.php' ?>
</div>
<div id="contenido">
	<form id="caja_Aportes" action="" method="POST">
		<div class = "contenedor">
			<div class = "titulo_form">
				<a class="tituloa">Aportes de caja</a>
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
				<button type="button" class="boton_Cancelar" onclick="window.location.href='cCaja.php'">Volver</button>
				<button class="primerbotoncaja" type="submit""> Nuevo Aporte </button>
			</div>
		</div>
	</form>
</div>
</div>
</body>
</html>