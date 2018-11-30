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
				<div class="busqueda">
					<form action="" method="get">
						<input type="text" name="txtSocio" placeholder="socio">
						<button type="submit"></button>
					</form>
						<!--
						<input type="text" name="txtSocio" placeholder="socio">
						<button name="btnBuscar">Buscar</button>
						 -->
				</div>
<?php 
if(isset($_GET['txtSocio'])){
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
						<?php foreach($this->ListarInscEsta as $a){  ?>
							<tr>
								<td class="campo_xxl"><?= $a["descripcion"] ?> </a></td>
								<td class="campo_xxl"><?= $a["precio"] ?> </a></td>
								<td class="campo_m"><a href="./cBorrar.php?id=<?= $a["idinscripcion"] ?>&link=Inscripcion">
												<IMG SRC="../img/delete.png" WIDTH=15 HEIGHT=15></IMG>
												</a></td>
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

					<!-- Si no pase ni id de socio ni txtsocio-->
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
							<select name="NumCouta">
								<?php/*	foreach($this->BuscarActividadDebe as $w){ 
									$Count = $w["Coutas_Pagas"];
									while($Count < $w["Inscripcion_totales"]){
										$Count++; ?>
										<option value="<?= $Count ?>"><?= $Count ?></option>
								<?php //} }*/ ?>
							</select>	
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