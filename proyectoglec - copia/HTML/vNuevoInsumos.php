<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/scriptpas.js"></script>
	<title>Nuevo Insumo</title>
</head>
	<body>
		<div class="bg">
			<div id="menu">
				<?php include 'vMenu.php' ?>
			</div>
			
			<div id="contenido">

					<div class = "contenedor">					

						<div class = "titulo_form">
							<a class="tituloa"> Generar Nuevo Insumo </a>
						</div>
							<form action="../controllers/cNuevoInsumos.php" method="POST">
								<div class = "tabla_form">
								<table>
									
									
									<tr>
										<td>
										Nombre Insumo
											<input type="text" name="nom" id="nom" required>
										</td>

										<td>Stock del Insumo
											<input type="number" name="stock" id="stock"  min="0" required>
										</td>
									</tr>
									<tr>
										<td>
										Precio del Insumo
											<input type="number" name="precio" id="precio"  min="0" required>
										</td>
										<td>
										Deporte del Insumo
											<select name="iddeporte">
												<?php	foreach($this->ListarDeportes as $d){ ?>
													<option value="<?= $d['iddeporte']?>"><?= $d['deporte']?></option>
												<?php } ?>
												
											</select>
										</td>
									</tr>						
								</table>
								</div>
								
								<div class="botones_accion_form">
									<button type="button" class="boton_Cancelar" onclick="window.location.href='cListarInsumos.php'">Volver</button>
									<input class="primerbotoncaja" type="submit" value="Alta de Insumo" />
								</div>
							</form>
						
					</div>

			</div>
			
		</div>
		
	</body>
</html>