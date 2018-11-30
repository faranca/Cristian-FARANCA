<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<script src="../js/jquery-2.1.4.min.js"></script>
	<script src="../js/scriptpas.js"></script>
	<title>Editar Empleado</title>
</head>
	<body>
		<div class="bg">
			<div id="menu">
				<?php include 'vMenu.php' ?>
			</div>
			
			<div id="contenido">

					<div class = "contenedor">					

						<div class = "titulo_form">
							<a class="tituloa"> Editar Empleado </a>
						</div>
							<form action="" method="POST">
								<div class = "tabla_form">
								<table>
									<?php	foreach($this->CargarEmpleado as $c){ ?>

										<input type="hidden" name="id" value="<?= $c["idpersona"] ?>">
									<tr>
										<td class="campo_m">Nombre</td>
										
										<td class="campo_xxl">
											<input type="text" name="nom" id="nom" value="<?= $c["nombre"] ?>" placeholder="Ingrese el Nombre" required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">Apellido</td>
										
										<td class="campo_xxl">
											<input type="text" name="ape" id="ape" value="<?= $c["apellido"] ?>" placeholder="Ingrese el Apellido" required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">Fecha de Nacimiento</td>
										<?php date_default_timezone_set('America/Argentina/Buenos_Aires'); ?>
										<td class="campo_xxl">
											<input type="date" min="1900-01-01" max="<?= date('Y-m-d') ?>" name="nac" id="nac" value="<?= $c["nac"] ?>" placeholder="Ingrese la Fecha de Nacimiento" required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">DNI</td>
										
										<td class="campo_xxl">
											<input type="text" name="dni" id="dni" value="<?= $c["dni"] ?>" pattern="[a-Z]{0,5}[.-][0-9]{1,15}" placeholder="Ingrese el DNI" required>
										</td>
									</tr>
									<tr>
										<td class="campo_m">Usuario</td>
										
										<td class="campo_xxl">
											<input type="text" name="user" id="user"  value="<?= $c["user"] ?>" placeholder="Ingrese el Usuario" required>
										</td>
									</tr>
									<tr id="passtr">
										<td class="campo_m">Contraseña</td>
										
										<td class="campo_xxl">
											<input type="password" name="pass1" id="pass1" value="<?= $c["clave"] ?>" placeholder="Ingrese la Contraseña" required>
										</td>
																	
										
									</tr>
									<tr>
										<td class="campo_m">Email</td>
										
										<td class="campo_xxl">
											<input type="email" name="mail" id="mail" value="<?= $c["email"] ?>" placeholder="Ingrese el Email" required>
										</td>
									<?php } ?>
								</table>
								</div>
								
								<div class="botones_accion_form">
									<button type="button" class="boton_Cancelar" onclick="window.location.href='cListaEmpleados.php'">Volver</button>
									<input class="primerbotoncaja" type="submit" value="Actualizar Empleado">
								</div>
								
							</form>
						
					</div>

			</div>
			
		</div>
		
	</body>
</html>