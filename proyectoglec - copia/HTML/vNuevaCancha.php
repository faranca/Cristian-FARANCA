<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/scriptpas.js"></script>
	<title>Nueva Cancha</title>
</head>
	<body>
		<div class="bg">
			<div id="menu">
				<?php include 'vMenu.php' ?>
			</div>
			
			<div id="contenido">

					<div class = "contenedor">					

						<div class = "titulo_form">
							<a class="tituloa"> Generar Nueva Cancha </a>
						</div>
							<form action="../controllers/cNuevaCancha.php" method="POST">
								<div class = "tabla_form">
								<table>
									
									
									<tr>
										<td class="campo_xxl">Nombre Cancha</td>
										
										<td class="campo_xxl">
											<input type="text" name="nom" id="nom" required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">Valor</td>
										
										<td class="campo_m">
											<input type="text" name="valor" id="valor" required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">deporte</td>
										
										<td class="campo_xxl">
											<select name="iddeporte">
												<?php	foreach($this->CargarDeporte as $d){ 
													if($c['iddeporte'] != $d['iddeporte']){ ?>
													<option value="<?= $d['iddeporte']?>"><?= $d['deporte']?></option>
												<?php	} } ?>
												
											</select>
										</td>
									</tr>

								</table>
								</div>
								
								<div class="botones_accion_form">
									<button type="button" class="boton_Cancelar" onclick="window.location.href='cListarCanchas.php'">Volver</button>
									<input class="primerbotoncaja" type="submit" value="Alta de Cancha" />
								</div>
							</form>
						
					</div>

			</div>
			
		</div>
		
	</body>
</html>