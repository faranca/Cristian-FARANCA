<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Inscripciones</title>
</head>
<body>
<div class="bg">
	<div id="menu">
		<?php include 'vMenu.php' ?>
	</div>
	
	<div id="contenido">
		<div class = "contenedor">
			
			<div class = "titulo_form">
				<a class="tituloa">Administracion de Inscripciones</a>
			</div>
			<div class = "contenido_form">
			<?php 
				if(isset($_GET['txtSocio'])){
			?>
			
				<div class="busqueda">
					<form action="" method="get">
						<input type="hidden" name="txtSocio" value="<?= $_GET['txtSocio'] ?>" placeholder="socio">
						
						<input type="hidden" name="idsocio" value="<?= $_GET['idsocio'] ?>">
						<button type="submit"></button>
						<?php 
							if(isset($_GET['idsocio'])){ 
						?>
							<input type="checkbox" id="VerDis" name="VerDis" title="Tildar para ver Discontinuados"><a>Discontinuados</a>
						<?php } ?>
					</form>
						
					</div>

<?php 
	if(isset($_GET['idsocio'])){ 
?>
				<div class="encabezado_lista">
					<table>
						<tr>
							<th class="campo_xxl">Actividad</th>
							<th class="campo_xxl">Precio</th>
							<th class="campo_m">Borrar</th>
							<th class="extra"/>
						</tr>
					</table>
				</div>
					<nav class ="scroll">
						<table>
						<?php foreach($this->ListarInscEsta as $a){ 
							if(!isset($_GET['VerDis'])){
								if(is_null($a["fecha_baja"])) {?>
									<tr>
										<td class="campo_xxl"><?= $a["descripcion"] ?> </a></td>
										<td class="campo_xxl"><?= $a["precio"] ?> </a></td>
										<td class="campo_m"><a href="./cBorrar.php?id=<?= $a["idinscripcion"] ?>&link=Inscripcion">
												<IMG SRC="../img/delete.png" WIDTH=15 HEIGHT=15></IMG>
												</a></td>
									</tr>
							<?php }} else {?>
									<tr>
										<td class="campo_xxl"><?= $a["descripcion"] ?> </a></td>
										<td class="campo_xxl"><?= $a["precio"] ?> </a></td>
										<?php if(is_null($a["fecha_baja"])) {?>
											<td class="campo_m"><a href="./cBorrar.php?id=<?= $a["idinscripcion"] ?>&link=Inscripcion">
												<IMG SRC="../img/delete.png" WIDTH=15 HEIGHT=15></IMG>
												</a></td>
										<?php } else {?>
											<td class="campo_m"><a href="./cRecuperar.php?id=<?= $a["idinscripcion"] ?>&link=Inscripcion">
												<IMG SRC="../img/tilde.jpg" WIDTH=15 HEIGHT=15></IMG>
												</a></td>

										<?php }} ?>		
									</tr>
						<?php } ?>
						</table>
					</nav>
			</div>
			
			<div class="botones_accion_form"> 
				<form action="./cCobro.php" method="POST">
					<input type="hidden" name="TipoCobro" value="Inscripcion">
					<input type="hidden" name="idSocio" value="<?= $_GET['idsocio'] ?>">
					<input type="hidden" name="Descripcion" value="Inscripcion <?= $_GET['txtSocio'] ?> Cuota 1">
					
					<select name="idActividad">
						<?php foreach($this->ListarInscNoEsta as $c){ ?>
							<option value="<?= $c["idactividad"] ?>"><?= $c["descripcion"] ?></option>
						<?php } ?>
					</select>
					
					<select name="Tipo">
						<option value='A'>Factura A</option>
						<option value='B'>Factura B</option>
						<option value='C'>Factura C</option>
					</select>
					<button type="button" class="boton_Cancelar" onclick="window.location.href='cListarInscripcion.php'">Volver</button>
					<button class="primerbotoncaja" type="submit">Inscribir</button>
				</form>
				<?php }else{ //si no esta seteado el id de socio 
					?>
					
				<div class="encabezado_lista">
					<table>
						<tr>
							<th class="campo_xxl">Nombre </th>
							<th class="campo_xxl">Apellido</th>
							<th class="campo_m">DNI</th>
						</tr>
					</table>
				</div>
				
					<nav class ="scroll">
						<table>
							<?php foreach($this->LisSocios as $b){ ?>
							<tr>
								<td class="campo_xxl"><a href= "./cListarInscripcion.php?txtSocio=<?= $b["dni"] ?>&idsocio=<?= $b["idpersona"] ?>"><?= $b["nombre"] ?> </a></td>
								<td class="campo_xxl"><a href= "./cListarInscripcion.php?txtSocio=<?= $b["dni"] ?>&idsocio=<?= $b["idpersona"] ?>"><?= $b["apellido"] ?> </a></td>
								<td class="campo_m"><a href= "./cListarInscripcion.php?txtSocio=<?= $b["dni"] ?>&idsocio=<?= $b["idpersona"] ?>"><?= $b["dni"] ?> </a></td>
							</tr>
							<?php } ?>
						</table>
					</nav>
		

					<?php  } } else {?>

							<div class="busqueda">
								<form action="./cListarInscripcion.php?txtSocio=<?= $_GET['txtSocio'] ?>&idsocio=<?= $_GET['idsocio'] ?>" method="get">
									<input type="text" name="txtSocio" placeholder="socio">
									<button type="submit"></button>
								</form>
									
							</div>
								
					<div class="encabezado_lista">
						<table>
							<tr>
								<th class="campo_m">Nombre </th>
								<th class="campo_xxl">Apellido</th>
								<th class="campo_m">DNI</th>
							</tr>
						</table>
					</div>

					<nav class ="scroll">
						<table>
							<tr>
								<td class="campo_m">-</td>
								<td class="campo_xxl">-</td>
								<td class="campo_m">-</td>
							</tr>
						</table>
					</nav>
				
				<?php } ?>

				<?php if(isset($_GET['idinscripcion'])){ ?>
					<!-- Si precione inscribir-->
					<div class="botones_accion_form"> 
						<form action="./cCobro.php" method="POST">
							
							<select name="Tipo">
								<option value='A'>Factura A</option>
								<option value="B">Factura B</option>
								<option value="C">Factura C</option>
							</select>
							<?php foreach($this->BuscarActividadSocio as $e){  ?>
								<input type="hidden" name="Descripcion" value="Inscripcion <?= $e["descripcion"] . " " . $_GET['txtSocio'] ?> ">
								<input type="hidden" name="Precio" value="<?= $e["precio"] ?>">
							<?php } ?>	
							<input type="hidden" name="idInscripcion" value="<?= $_GET['idinscripcion'] ?>">
							<input type="hidden" name="TipoCobro" value="Inscripcion">
							<button class="botonunico" type="submit">Cobrar</button>
						
						</form>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
		
</div>
</div>
</body>
</html>