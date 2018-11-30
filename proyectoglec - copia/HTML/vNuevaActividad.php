<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/scriptpas.js"></script>
	<title>Nueva Actividad</title>
</head>
	<body>
		<div class="bg">
			<div id="menu">
				<?php include 'vMenu.php' ?>
			</div>
			
			<div id="contenido">

					<div class = "contenedor">					

						<div class = "titulo_form">
							<a class="tituloa"> Generar Nueva Actividad </a>
						</div>
							<form action="../controllers/cNuevaActividad.php" method="POST">
								<div class = "tabla_form">
								<table>
									
									
									<tr>
										<td class="campo_xxl">Nombre Actividad</td>
										
										<td class="campo_xxl">
											<input type="text" name="nom" id="nom" required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">Precio</td>
										
										<td class="campo_m">
											<input type="text" name="precio" id="precio" required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">Cancha</td>
										
										<td class="campo_xxl">
											<select name="idcancha">
												<?php	foreach($this->CargarCancha as $d){ 
													if($c['idcancha'] != $d['idcancha']){ ?>
													<option value="<?= $d['idcancha']?>"><?= $d['cancha']?></option>
												<?php	} } ?>
												
											</select>
										</td>
									</tr>

								</table>
								</div>
								
								<div class="botones_accion_form">
									<button type="button" class="boton_Cancelar" onclick="window.location.href='cListarActividades.php'">Volver</button>
									<input class="primerbotoncaja" type="submit" value="Alta de Actividad" />
								</div>
							</form>
						
					</div>

			</div>
			
		</div>
		
	</body>
</html>