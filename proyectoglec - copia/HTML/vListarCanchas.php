<!DOCTYPE html>
<?php 
//estamos en HTML/vListaCanchas.php
 ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Lista de Canchas</title>
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
					<a class="tituloa"> Lista de Canchas </a>
				</div>

				<div class = "contenido_form">
					<div class="busqueda">
					<form action="../controllers/cListaCanchas.php" method="get">
						<input type="text" name="nom" id="nom"  placeholder="Nombre de la cancha">
						<button type="submit"></button>
						<input type="checkbox" name="VerDis" title="Tildar para ver Discontinuados"><a>Discontinuados</a>
					</form>
					</div>
					<div class="encabezado_lista">
						<table>
							<tr>

								<th class="campo_xxl">Nombre Cancha</th>
								<th class="campo_m">valor</th>
								<th class="campo_xxl">deporte</th>
								<th class="campo_m">Editar</th>
								<th class="campo_m">Borrar</th>
								<th class="extra"/>
								
							</tr>
						</table>
					</div>
						

						<nav class ="scroll">
							<table > 
								<?php 
									foreach($this->ListarCanchas as $b){ 
										if( !isset($_GET['VerDis'])){
											if ($b["discontinuado"] !=1 ) {
								?>
								<tr class="campo_dinamico">
								
									<td class="campo_xxl"><?= $b["nombre"] ?></td>
									<td class="campo_m"><?= $b["valor"] ?></td>
									<td class="campo_xxl"><?= $b["deporte"] ?></td>
									<td class="campo_m">
										<a href="./cEditarCancha.php?id=<?= $b["idcancha"] ?>">
										<IMG SRC="../img/edit.png" WIDTH=15 HEIGHT=15></IMG>
										</a>
									</td>

									<?php
										if($b["discontinuado"] ==0 ) {
									?>

									<td class="campo_m">
										<a href="./cBorrar.php?id=<?= $b["idcancha"] ?>&link=Canchas">
										<IMG SRC="../img/delete.png" WIDTH=15 HEIGHT=15></IMG>
										</a>
									</td>
									
									<?php } ?>

								</tr>
								<?php }} else {?>

										<tr class="campo_dinamico">
								
									<td class="campo_xxl"><?= $b["nombre"] ?></td>
									<td class="campo_m"><?= $b["valor"] ?></td>
									<td class="campo_xxl"><?= $b["deporte"] ?></td>
									<td class="campo_m">
										<a href="./cEditarCancha.php?id=<?= $b["idcancha"] ?>">
										<IMG SRC="../img/edit.png" WIDTH=15 HEIGHT=15></IMG>
										</a>
									</td>

									<?php
										if($b["discontinuado"] ==0 ) {
									?>

									<td class="campo_m">
										<a href="./cBorrar.php?id=<?= $b["idcancha"] ?>&link=Canchas">
										<IMG SRC="../img/delete.png" WIDTH=15 HEIGHT=15></IMG>
										</a>
									</td>
									
									<?php
											 }
									else { ?>
									<td class="campo_m">
										<a href="./cRecuperar.php?id=<?= $b["idcancha"] ?>&link=Canchas">
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

					<button class="primerbotoncaja" type="button" onclick="window.location.href='./cNuevaCancha.php'"> Nueva Cancha </button>
					<button class="botoncaja" type="button" onclick="window.location.href='./cListarDeportes.php'"> Deporte </button>

					
				</div>
			</div>

			
		</form>
    </div>
</div>
</body>
</html>