<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/scriptpas.js"></script>
	<title>Editar Actividad</title>
</head>
	<body>
		<div class="bg">
			<div id="menu">
				<?php include 'vMenu.php' ?>
			</div>
			
			<div id="contenido">

					<div class = "contenedor">					

						<div class = "titulo_form">
							<a class="tituloa"> Editar Actividad </a>
						</div>
							<form action="" method="POST">
								<div class = "tabla_form">
								<table>
									<?php	foreach($this->CargarActividad as $c){ ?>

										<input type="hidden" name="id" value="<?= $c["idactividad"] ?>">
									<tr>
										<td class="campo_xxl">Nombre Actividad</td>
										
										<td class="campo_xxl">
											<input type="text" name="nom" id="nom" value="<?= $c["nombre"] ?>" required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">Precio</td>
										
										<td class="campo_m">
											<input type="text" name="precio" id="precio" value="<?= $c["precio"] ?>"  required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">cancha</td>
										
										<td class="campo_xxl">
											<select name="idcancha">
												<option value="<?= $c['idcancha']?>" selected><?= $c['cancha']?></option>
												<?php	foreach($this->CargarCancha as $d){ 
													if($c['idcancha'] != $d['idcancha']){ ?>
													<option value="<?= $d['idcancha']?>"><?= $d['cancha']?></option>
												<?php	} } ?>
												
											</select>
										</td>
									</tr>
									
									<?php } ?>
								</table>
								</div>
							
								<div class="botones_accion_form">
									<button type="button" class="boton_Cancelar" onclick="window.location.href='cListarActividades.php'">Volver</button>
									<input class="primerbotoncaja" type="submit" value="Actualizar Actividad">
								</div>
								
							</form>
						
					</div>

			</div>
			
		</div>
		
	</body>
</html>
