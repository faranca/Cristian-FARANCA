<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/scriptpas.js"></script>
	<title>Nuevo Empleado</title>
</head>
	<body>
		<div class="bg">
			<div id="menu">
				<?php include 'vMenu.php' ?>
			</div>
			
			<div id="contenido">

					<div class = "contenedor">					

						<div class = "titulo_form">
							<a class="tituloa"> Generar Nuevo Empleado </a>
						</div>
						<div class = "contenido_form">
							<form action="../controllers/cNuevoEmpleado.php" method="POST">
								<div class = "tabla_form">
								<table>
									
									<tr>
										<td>
											Nombre
											<input type="text" name="nom" id="nom"  placeholder="Ingrese el Nombre" required>
										</td>
										<td>
											Apellido								
											<input type="text" name="ape" id="ape"  placeholder="Ingrese el Apellido" required>
										</td>
									</tr>
									<tr>
										<td>
											Fecha de Nacimiento
											<?php date_default_timezone_set('America/Argentina/Buenos_Aires'); ?>
											<input type="date" min="1900-01-01" max="<?= date('Y-m-d') ?>" name="nac" id="nac"  placeholder="Ingrese la Fecha de Nacimiento" required>
										</td>
										<td>
											DNI
											<input type="text" name="dni" id="dni"  placeholder="Ingrese el DNI" pattern="[a-Z]{0,5}[.-][0-9]{1,15}" required>
											<div id="espacio_dni"></div>
										</td>
									</tr>
									<tr>
										<td>
											Email
											<input type="email" name="mail" id="mail"  placeholder="Ingrese el Email" required>
										</td>
										<td>
											Usuario
											<input type="text" name="user" id="user"  placeholder="Ingrese el Usuario" required>
										</td>
									</tr>
									<tr id="passtr">
										<td>
											Contraseña
											<input type="password" name="pass1" id="pass1"  placeholder="Ingrese la Contraseña" required>
											<div id="espacio_clave"></div>
										</td>
										<td>
											Reingresar contraseña
											<input type="password" name="pass2" id="pass2"  placeholder="Re-Ingrese la Contraseña" required>
											<div id="errorpass"></div>
										</td>
									</tr>
								</table>
								</div>
								
								<div class="botones_accion_form">
									<button type="button" class="boton_Cancelar" onclick="window.location.href='cListaEmpleados.php'">Volver</button>
									<input class="primerbotoncaja" type="submit" value="Alta de Empleado" />
								</div>
							</form>
						</div>
					</div>

			</div>
			
		</div>
		
	</body>
</html>