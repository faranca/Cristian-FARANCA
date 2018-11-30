<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Cuotas</title>
</head>
<body>
<div class="bg">
<div id="menu">
	<?php include 'vMenu.php' ?>
</div>
<div id="contenido">
	<form id = "caja_cuota">
		<div class = "contenedor">
			<div class = "titulo_form">
				<a class="tituloa">Administracion de Cuotas</a> <?php if(isset($_GET['baja'])){echo "- Inscripcion dada de baja";} ?>
			</div>
			<div class = "contenido_form">
				<div class="busqueda">
					<form action="" method="get">
					<input type="text" name="txtSocio" placeholder="socio">
					<button type="submit"></button>
					</form>
					<?php /* 
					<input type="text" name="txtSocio" placeholder="socio">
					<button name="btnBuscar">Buscar</button>
					 */ ?>
				</div>
				<?php $flag=0;
					if(isset($_GET['txtSocio'])){
						if(isset($_GET['idsocio'])){
							if(isset($_GET['idinscripcion'])){
							?> 
								<div class="encabezado_lista">
									<table>
										<tr>
											<th class="campo_xxl">Numero de Cuota</th>
											<th class="campo_xxl">Estado</th>
										</tr>
									</table>
								</div>
								<nav class ="scroll">
									<table>
										<?php	foreach($this->BuscarActividadPaga as $q){ ?>
										<tr>
											<td class="campo_xxl"> <?= $q["numero_cuota"] ?></td>
											<td class="campo_xxl">Pago</td>
										</tr>
									<?php } ?>
									<?php	foreach($this->BuscarActividadDebe as $r){ 
													$Cont = $r["Coutas_Pagas"];
													while($Cont < $r["Cuotas_totales"]){
														$Cont++; $flag=1;?>
										<tr class="movE">
											<td class="campo_xxl"> <?= $Cont ?></td>
											<td class="campo_xxl">Debe</td>
										</tr>
					  							<?php } }  ?>
									</table>
								</nav></div>
					<?php } else { ?>
					<div class="encabezado_lista">
						<table>
							<tr>
								<th class="campo_xxl">Actividad</th>
								<th class="campo_xxl">Precio</th>
							</tr>
						</table>
					</div>
					<nav class ="scroll">
						<table>
						<?php foreach($this->BuscarActividadSocio as $c){  ?>
							<tr>
								<td class="campo_xxl"><a href= "./cCuota.php?txtSocio=<?= $_GET['txtSocio'] ?>&idsocio=<?= $_GET['idsocio'] ?>&idinscripcion=<?= $c["idinscripcion"] ?>&idactividad=<?= $c["idactividad"] ?><?php if(!is_null($c["fecha_baja"])){echo "&baja=1";} ?>">
									<?= $c["descripcion"] ?></a><?php if(!is_null($c["fecha_baja"])){echo " - Baja";} ?></td>
								<td class="campo_xxl"><a href= "./cCuota.php?txtSocio=<?= $_GET['txtSocio'] ?>&idsocio=<?= $_GET['idsocio'] ?>&idinscripcion=<?= $c["idinscripcion"] ?>&idactividad=<?= $c["idactividad"] ?><?php if(!is_null($c["fecha_baja"])){echo "&baja=1";} ?>">
									<?= $c["precio"] ?> </a></td>
							</tr>
						<?php } ?>
						</table>
					</nav></div> 
				<?php } } else { ?>
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
						<?php 
								foreach($this->BuscarSocio as $b){ 
							?>
						<tr>
							<td class="campo_xxl"><a href= "./cCuota.php?txtSocio=<?= $b["dni"] ?>&idsocio=<?= $b["idpersona"] ?>"><?= $b["nombre"] ?> </a></td>
							<td class="campo_xxl"><a href= "./cCuota.php?txtSocio=<?= $b["dni"] ?>&idsocio=<?= $b["idpersona"] ?>"><?= $b["apellido"] ?> </a></td>
							<td class="campo_m"><a href= "./cCuota.php?txtSocio=<?= $b["dni"] ?>&idsocio=<?= $b["idpersona"] ?>"><?= $b["dni"] ?> </a></td>
						</tr>
					<?php } ?>
					</table>
				</nav>
			</div>
				<?php  } } else {?>
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
			</div>
			<?php } ?>
			<div class="botones_accion_form"> 
				<button type="button" class="boton_Cancelar" onclick="window.location.href='cCaja.php'">Volver</button>
				<?php if(isset($_GET['idinscripcion']) and $flag!=0){ ?>
					<form action="./cCobro.php" method="POST">
						<select name="CantCuota">
							<?php foreach($this->BuscarActividadDebe as $w){ 
								$Count = $w["Coutas_Pagas"];
								$Count2 = $w["Coutas_Pagas"];
								$Num = 1; ?>
							<?php while($Count < $w["Cuotas_totales"]){
									$Count++; $flag = 1;?>
									<option value="<?= $Num ?>"> Pagar <?= $Num ?> cuota<?php if($Num>1){ echo "s";} ?></option>
  							<?php $Num++; 
  								  } } ?>
  						</select>
  						<input type="hidden" name="Coutas_Pagas" value="<?= $Count2 ?>">	
  						<select name="Tipo">
							<option value='A'>Factura A</option>
  							<option value="B">Factura B</option>
  							<option value="C">Factura C</option>
  						</select>
  						<?php foreach($this->BuscarActividadSocio1 as $e){  ?>
							<input type="hidden" name="Descripcion" value="Cuota <?= $e["descripcion"] . " " . $_GET['txtSocio'] ?> ">
							<input type="hidden" name="Precio" value="<?= $e["precio"] ?>">
						<?php } ?>	
						<input type="hidden" name="idInscripcion" value="<?= $_GET['idinscripcion'] ?>">
						<input type="hidden" name="TipoCobro" value="Cuota">
  						<button class="primerbotoncaja" type="submit">Cobrar</button>
  					</form>
				<?php } ?>	
			</div>
		</div>
	</form>
</div>
</div>
</body>
</html>