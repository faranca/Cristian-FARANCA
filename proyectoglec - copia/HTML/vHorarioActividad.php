<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Reservas</title>
</head>
<body>
<div class="bg">
	<div id="menu">
		<?php include 'vMenu.php' ?>
	</div>
	<?php include '../tools/funciones.php' ?>
	<div id="contenido">
		<div class = "contenedor">
			<div class = "titulo_form">
				<a class="tituloa">Horarios de actividad</a>
			</div>

			<div class = "contenido_form">
				<div class="botones_horarios">
					<form action="" method="POST" id="horariosactividad">
						<select name="dia">
							<option value=1>Lunes</option>
							<option value=2>Martes</option>
							<option value=3>Miercoles</option>
							<option value=4>Jueves</option>
							<option value=5>Viernes</option>
							<option value=6>Sabado</option>
							<option value=7>Domingo</option>
						</select>
						<input type="time" name="Hdesde" class="fechal" placeholder="Desde" value="09:30" step="1800" required>
						<input type="TIME" name="Hhasta" class="fechal" placeholder="Hasta" value="10:30" step="1800" required>
						<input type="hidden" name="idactividad" value="<?= $this->idActividad ?>" >
						<input type="submit" name="nuevo" value="Añadir">
					</form>
				</div>
				<div class="encabezado_lista">
					<table>
						<tr>
							<th class="campo_m">Dia</th>
							<th class ="campo_l">Hora Inicio</th>
							<th class ="campo_l">Hora Fin</th>
							<th class ="campo_m">Eliminar</th>
						</tr>
					</table>
				</div>
				<nav class ="scroll">
					<table class="lista">
						<?php foreach($this->horarios as $h){ ?>
						<tr>
							<td class="campo_m"><?= intToDayName($h["dia"]) ?></td>
							<td class="campo_l"><?= $h["hora_inicio"] ?></td>
							<td class="campo_l"><?= $h["hora_fin"] ?></td>
							<td><input type="hidden" name="idhorario" value=<?= $h["idhorario"] ?>></td>
							<td class="campo_m">
								<a href="./cHorarioActividad.php?idhorario= <?= $h["idhorario"] ?>&idactividad=<?= $this->idActividad ?>">
									<IMG SRC="../img/delete.png" WIDTH=15 HEIGHT=15></IMG>
								</a>
							</td>
					
						</tr>
						<?php } ?>
					</table>
				</nav>		
			</div>
			<div class="botones_accion_form">
				<button class="primerbotoncaja" type="button" onclick="window.location.href='./cListarActividades.php'">Volver</button>
			</div>
		</div>

	</div>
</div>


</body>
</html>