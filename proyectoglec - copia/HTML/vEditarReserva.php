<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/scriptpas.js"></script>
	<title>Editar Reserva</title>
</head>
	<body>
		<div class="bg">
			<div id="menu">
				<?php include 'vMenu.php' ?>
			</div>
			
			<div id="contenido">

					<div class = "contenedor">					

						<div class = "titulo_form">
							<a class="tituloa"> Editar Reserva </a>
						</div>
							<form action="" method="POST">
								<div class = "tabla_form">
								<table>
									<?php	foreach($this->CargarReserva as $c){
										?>

										<input type="hidden" name="id" value="<?= $c["idreserva"] ?>">
									<tr>
										<td class="campo_m">Nombre</td>
										
										<td class="campo_xxl">
											<input type="text" name="nombre" value="<?= $c["nombre"] ?>" placeholder="Ingrese el Nombre" required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">DNI</td>
										
										<td class="campo_xxl">
											<input type="text" name="dni" value="<?= $c["dni"] ?>" placeholder="Ingrese el DNI" required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">Telefono</td>
										
										<td class="campo_xxl">
											<input type="text" name="telefono" value="<?= $c["telefono"] ?>" placeholder="Ingrese un Telefono">
										</td>
									</tr>
									
									<tr>
										<td class="campo_m">observacion</td>
										
										<td class="campo_xxl">
											<input type="text" name="observacion" value="<?= $c["observacion"] ?>" placeholder="Ingrese una Observacion">
										</td>
									<?php } ?>
								</table>
								</div>
								<div class="botones_accion_form">
									<button type="button" class="boton_Cancelar"">Volver</button>
									<input class="primerbotoncaja" type="submit" value="Actualizar Reserva">
								</div>
							</form>
						
					</div>

			</div>
			
		</div>
		
	</body>
</html>
