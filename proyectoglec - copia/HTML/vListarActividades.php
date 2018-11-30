<!DOCTYPE html>
<?php 
//estamos en HTML/vListaActividades.php
 ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Lista de Actividades</title>
</head>
<body>
<div class="bg">
	<div id="menu">
	<?php include 'vMenu.php' ?>
	</div>
	<div id="contenido">
		<form id = "lCancha">
			<div class = "contenedor">
				<div class = "titulo_form">
					<a class="tituloa"> Lista de Actividades </a>
				</div>

				<div class = "contenido_form">
					<div class="busqueda">
					<form action="../controllers/cListaActividades.php" method="get">
						<input type="text" name="nom" id="nom"  placeholder="Nombre de la actividad">
						<button type="submit"></button>
						<input type="checkbox" name="VerDis" title="Tildar para ver Discontinuados"><a>Discontinuados</a>
					</form>
					</div>
					<div class="encabezado_lista">
						<table>
							<tr>

								<th class="campo_xxl">Nombre Actividad</th>
								<th class="campo_m">precio</th>
								<th class="campo_xxl">cancha</th>
								<th class="campo_m">Horarios</th>
								<th class="campo_m">Editar</th>
								<th class="campo_m">Borrar</th>
								<th class="extra"/>
								
							</tr>
						</table>
					</div>
						

						<nav class ="scroll">
							<table > 
								<?php 
									foreach($this->ListarActividades as $b){ 
										if( !isset($_GET['VerDis'])){
											if ($b["discontinuada"] !=1 ) {
								?>
								<tr class="campo_dinamico">
								
									<td class="campo_xxl"><?= $b["nombre"] ?></td>
									<td class="campo_m"><?= $b["precio"] ?></td>
									<td class="campo_xxl"><?= $b["cancha"] ?></td>
									<td class="campo_m">
										<a href="./cHorarioActividad.php?idactividad=<?= $b["idactividad"] ?>">
											<IMG SRC="../img/clock.png"></IMG>
										</a>
									</td>
									<td class="campo_m">
										<a href="./cEditarActividad.php?id=<?= $b["idactividad"] ?>">
										<IMG SRC="../img/edit.png" WIDTH=15 HEIGHT=15></IMG>
										</a>
									</td>

									<?php
										if($b["discontinuada"] ==0 ) {
									?>

									<td class="campo_m">
										<a href="./cBorrar.php?id=<?= $b["idactividad"] ?>&link=Actividades">
										<IMG SRC="../img/delete.png" WIDTH=15 HEIGHT=15></IMG>
										</a>
									</td>
									
									<?php } ?>

								</tr>
								<?php }} else {?>

										<tr class="campo_dinamico">
								
									<td class="campo_xxl"><?= $b["nombre"] ?></td>
									<td class="campo_m"><?= $b["precio"] ?></td>
									<td class="campo_xxl"><?= $b["cancha"] ?></td>
									<td class="campo_m">
										<a href="./cHorarioActividad.php?idactividad=<?= $b["idactividad"] ?>">
										<IMG SRC="../img/clock.png"></IMG>
										</a>
									</td>
									<td class="campo_m">
										<a href="./cEditarActividad.php?id=<?= $b["idactividad"] ?>">
										<IMG SRC="../img/edit.png" WIDTH=15 HEIGHT=15></IMG>
										</a>
									</td>

									<?php
										if($b["discontinuada"] ==0 ) {
									?>

									<td class="campo_m">
										<a href="./cBorrar.php?id=<?= $b["idactividad"] ?>&link=Actividades">
										<IMG SRC="../img/delete.png" WIDTH=15 HEIGHT=15></IMG>
										</a>
									</td>
									
									<?php
											 }
									else { ?>
									<td class="campo_m">
										<a href="./cRecuperar.php?id=<?= $b["idactividad"] ?>&link=Actividades">
										<IMG SRC="../img/tilde.jpg" WIDTH=15 HEIGHT=15></IMG>
										</a>
									</td>
						
									<?php } ?>

								</tr>

								<?php 
							}
							} ?>
										
								
							</table>
						</nav>
					

				</div>
				<div class="botones_accion_form">
					<button class="primerbotoncaja" type="button" onclick="window.location.href='./cNuevaActividad.php'"> Nueva </button>
				</div>
			</div>

			
		</form>
    </div>
</div>
</body>
</html>
