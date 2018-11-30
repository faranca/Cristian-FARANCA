<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/scriptpas.js"></script>
	<title>Editar Cancha</title>
</head>
	<body>
		<div class="bg">
			<div id="menu">
				<?php include 'vMenu.php' ?>
			</div>
			
			<div id="contenido">

					<div class = "contenedor">					

						<div class = "titulo_form">
							<a class="tituloa"> Editar Cancha </a>
						</div>
							<form action="" method="POST">
								<div class = "tabla_form">
								<table>
									<?php	foreach($this->CargarCancha as $c){ ?>

										<input type="hidden" name="id" value="<?= $c["idcancha"] ?>">
									<tr>
										<td class="campo_xxl">Nombre Cancha</td>
										
										<td class="campo_xxl">
											<input type="text" name="nom" id="nom" value="<?= $c["nombre"] ?>" required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">Valor</td>
										
										<td class="campo_m">
											<input type="text" name="valor" id="valor" value="<?= $c["valor"] ?>"  required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">deporte</td>
										
										<td class="campo_xxl">
											<select name="iddeporte">
												<option value="<?= $c['iddeporte']?>" selected><?= $c['deporte']?></option>
												<?php	foreach($this->CargarDeporte as $d){ 
													if($c['iddeporte'] != $d['iddeporte']){ ?>
													<option value="<?= $d['iddeporte']?>"><?= $d['deporte']?></option>
												<?php	} } ?>
												
											</select>
										</td>
									</tr>
									
									<?php } ?>
								</table>
								</div>
							
								<div class="botones_accion_form">
									<button type="button" class="boton_Cancelar" onclick="window.location.href='cListarCanchas.php'">Volver</button>
									<input class="primerbotoncaja" type="submit" value="Actualizar Cancha">
								</div>

							</form>
						
					</div>

			</div>
			
		</div>
		
	</body>
</html>
