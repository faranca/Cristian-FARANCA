<!DOCTYPE html>
<?php 
//estamos en HTML/vListaSocios.php
 ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Lista de Socios</title>
</head>
<body>
<div class="bg">
	<div id="menu">
	<?php include 'vMenu.php' ?>
	</div>
	<div id="contenido">
		<form id = "lSocio">
			<div class = "contenedor">
				<div class = "titulo_form">
					<a class="tituloa"> Lista de Socios </a>

				</div>

				<div class = "contenido_form">
					<div class="busqueda">
					<form action="../controllers/cListaSocios.php" method="get">
						<input type="text" name="nom" id="nom"  placeholder="Nombre, Apellido o DNI">
						<button type="submit"></button>
						<input type="checkbox" name="VerDis" title="Tildar para ver Discontinuados"><a>Discontinuados</a>
					</form>
					</div>
					<div class="encabezado_lista">
						<table>
							<tr>

								<th class="campo_xxl">Nombre</th>
								<th class="campo_xxl">Apellido</th>
								<th class="campo_m">DNI</th>
								<th class="campo_m">Editar</th>
								<th class="campo_m">Borrar</th>
								<th class="extra"/>
								
							</tr>
						</table>
					</div>
						

						<nav class ="scroll">
							<table > 
								<?php 
									foreach($this->LisSocios as $b){ 
										if( !isset($_GET['VerDis'])){
											if ($b["discontinuado"] !=1 ) {
								?>
								<tr class="campo_dinamico">
								
									<td class="campo_xxl"><?= $b["nombre"] ?></td>
									<td class="campo_xxl"><?= $b["apellido"] ?></td>
									<td class="campo_m"><?= $b["dni"] ?></td>
									<td class="campo_m">
										<a href="./cEditarSocio.php?id=<?= $b["idpersona"] ?>">
										<IMG SRC="../img/edit.png" WIDTH=15 HEIGHT=15></IMG>
										</a>
									</td>

									<?php
										if($b["discontinuado"] ==0 ) {
									?>

									<td class="campo_m">
										<a href="./cBorrar.php?id=<?= $b["idpersona"] ?>&link=Socios">
										<IMG SRC="../img/delete.png" WIDTH=15 HEIGHT=15></IMG>
										</a>
									</td>
									
									<?php } ?>

								</tr>
								<?php }} else {?>

										<tr class="campo_dinamico">
								
									<td class="campo_xxl"><?= $b["nombre"] ?></td>
									<td class="campo_xxl"><?= $b["apellido"] ?></td>
									<td class="campo_m"><?= $b["dni"] ?></td>
									<td class="campo_m">
										<a href="./cEditarSocio.php?id=<?= $b["idpersona"] ?>">
										<IMG SRC="../img/edit.png" WIDTH=15 HEIGHT=15></IMG>
										</a>
									</td>

									<?php
										if($b["discontinuado"] ==0 ) {
									?>

									<td class="campo_m">
										<a href="./cBorrar.php?id=<?= $b["idpersona"] ?>&link=Socios">
										<IMG SRC="../img/delete.png" WIDTH=15 HEIGHT=15></IMG>
										</a>
									</td>
									
									<?php
											 }
									else { ?>
									<td class="campo_m">
										<a href="./cRecuperar.php?id=<?= $b["idpersona"] ?>&link=Socios">
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
					<button class="primerbotoncaja"  type="button" onclick="window.location.href='./cNuevoSocio.php'"> Nuevo socio</button>
				</div>
			</div>

			
		</form>
    </div>
</div>
</body>
</html>
