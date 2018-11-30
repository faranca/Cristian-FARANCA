<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/scriptpas.js"></script>
	<title>Nuevo Deporte</title>
</head>
	<body>
		<div class="bg">
			<div id="menu">
				<?php include 'vMenu.php' ?>
			</div>
			
			<div id="contenido">

					<div class = "contenedor">					

						<div class = "titulo_form">
							<a class="tituloa"> Generar Nuevo Deporte </a>
						</div>
							<form action="../controllers/cNuevoDeportes.php" method="POST">
								<div class = "tabla_form">
								<table>
									
									
									<tr>
										<td class="campo_xxl">Nombre Deporte</td>
										
										<td class="campo_xxl">
											<input type="text" name="nom" id="nom" required>
										</td>
									</tr>
																

								</table>
								</div>
								
								<div class="botones_accion_form">
									<button type="button" class="boton_Cancelar" onclick="window.location.href='cListarDeportes.php'">Volver</button>
									<input class="primerbotoncaja" type="submit" value="Alta de Deporte" />
								</div>
							</form>
						
					</div>

			</div>
			
		</div>
		
	</body>
</html>