<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/scriptpas.js"></script>
	<title>Editar Deporte</title>
</head>
	<body>
		<div class="bg">
			<div id="menu">
				<?php include 'vMenu.php' ?>
			</div>
			
			<div id="contenido">

					<div class = "contenedor">					

						<div class = "titulo_form">
							<a class="tituloa"> Editar Deporte </a>
						</div>
							<form action="" method="POST">
								<div class = "tabla_form">
								<table>
									<?php	foreach($this->CargarDeporte as $c){ ?>

										<input type="hidden" name="id" value="<?= $c["iddeporte"] ?>">
									<tr>
										<td class="campo_xxl">Nombre Deporte</td>
										
										<td class="campo_xxl">
											<input type="text" name="nom" id="nom" value="<?= $c["nombre"] ?>" required>
										</td>
									</tr>
									
									
									<?php } ?>
								</table>
								</div>
								<div class="botones_accion_form">
									<button type="button" class="boton_Cancelar" onclick="window.location.href='cListarDeportes.php'">Volver</button>
									<input class="primerbotoncaja" type="submit" value="Actualizar Deporte">
								</div>
							</form>
						
					</div>

			</div>
			
		</div>
		
	</body>
</html>
