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
<div id="contenido">
	<div class = "contenedor">
		<div class = "titulo_form">
			<a class="tituloa">Reservas</a>
		</div>
		<div class = "contenido_form">
			<?php date_default_timezone_set('America/Argentina/Buenos_Aires'); ?>
			<div class="busqueda">
			<form action="" method="POST">
				<?php 
					if(isset($_POST['fecha_reserva'])){
						$ffecha = $_POST['fecha_reserva'];
					}else{
						$ffecha = date('Y-m-d'); 
					}
					?>
				<input type="date" name="fecha_reserva" class="fechal" value="<?= $ffecha; ?>"  required>
				
				<?php 
					if(isset($_POST['Hdesde'])){
						$fHdesde = $_POST['Hdesde'];
					}else{
						$fHdesde = DATE("H").":00:00";
					} 
				?>
				<input type="time" name="Hdesde" id="Hdesde" class="fechal" placeholder="Desde"  value="<?= $fHdesde ?>" step="1800" required>

				<?php 
					if(isset($_POST['Hhasta'])){
						$fHhasta = $_POST['Hhasta'];
					}else{
						$fHhasta = '23:30'; 
					}
				?>
				<input type="TIME" name="Hhasta" id="Hhasta" class="fechal" placeholder="Hasta" value="<?= $fHhasta; ?>" step="1800" required>

				<?php
				if(isset($_POST['idcancha'])){
						$fidcancha = $_POST['idcancha'];
					}else{
						$fidcancha = 1; 
					}	
				?>
				<select name="idcancha" value="">
					<?php 
					foreach($this->BuscarCancha as $c){
						
						if($c['idcancha']===$fidcancha){
							echo "<option value=".$c['idcancha']." selected> ".$c['descripcion']." </option>";
						}else{
							echo "<option value=".$c['idcancha']."> ".$c['descripcion']." </option>";
						}
					} ?>
				</select>
				<button type="submit" name="btnBuscar"></button>
			</form>
			</div>
			<div class="encabezado_lista">
				<table>
					<tr>
						<th class="campo_m">Dia</th>
						<th class ="campo_m">Cancha</th>
						<th class ="campo_l">Hora Inicio</th>
						<th class ="campo_l">Hora Fin</th>
						<th class ="campo_s">Seña</th>
						<th class ="campo_m">Nombre</th>
					</tr>
				</table>
			</div>
			<nav class ="scroll">
				<table class="lista">
					<?php $r1=0; 
						if(isset($_POST['Hdesde']) and $_POST['fecha_reserva'] >= date('Y-m-d')){ $r=0; 
							foreach($this->BuscarReserva as $r){ 
								if($r!=0){ 
									$r1=$r["fecha_reserva"];
									if(!is_null($r["fecha_reserva"])){?>
							<tr>
								<td class="campo_m"><?= $r["fecha_reserva"] ?></td>
								<td class="campo_m"><?= $r["descripcion"] ?></td>
								<td class="campo_l"><?= $r["hora_desde"] ?></td>
								<td class="campo_l"><?= $r["hora_hasta"] ?></td>
								<td class="campo_s"><?php if($r["importe"] != "ACT"){ echo "$";} ?><?= $r["importe"] ?></td>
								<td class="campo_m"><?= $r["nombre"] ?></td>
								<td> <?php if($r["id"]!=0){ ?><a href="./cEditarReserva.php?id=<?= $r["id"] ?>">
										<IMG SRC="../img/edit.png" WIDTH=15 HEIGHT=15></IMG>
										</a><?php }?></td>	
							</tr>
							<?php } } } } else {?>
								<tr>
									<td class="campo_m">-</td>
									<td class="campo_m">-</td>
									<td class="campo_l">-</td>
									<td class="campo_l">-</td>
									<td class="campo_s">-</td>
									<td class="campo_m">-</td>
								</tr>
						<?php }?>
				</table>
			</nav>
						
		</div>
		<div class="botones_accion_form">
			<form action="./cNuevaeditreserva.php" method="POST">
				<input type="hidden" name="fecha" class="fechal" value="<?= $_POST['fecha_reserva'] ?>">
				<input type="hidden" name="Hinicio" class="fechal" placeholder="Desde" value="<?=  $_POST['Hdesde'] ?>">
				<input type="hidden" name="Hfin" class="fechal" placeholder="Hasta" value="<?= $_POST['Hhasta'] ?>">
				<input type="hidden" name="idcancha" value="<?= $_POST['idcancha'] ?>">
				<?php if(isset($_POST['Hdesde'])){
					if(!is_null($r1) or $_POST['Hdesde'] >= $_POST['Hhasta']){
						?>
						<button type="submit" class="primerbotoncaja" name="btnBuscar" disabled style="cursor:no-drop">Reservar</button>
						<?php  } else { ?>

						<button type="submit" class="primerbotoncaja" name="btnBuscar">Reservar</button>

				<?php  } }?>
				<button type="button" class="botonunico" onclick="window.location.href='cRestoReserva.php'">Cobrar Resto de las Reservas</button>
				<button type="button" class="boton_Cancelar" onclick="window.location.href='cCaja.php'">Volver</button>
			</form>

		</div>
	</div>

</div>
</div>
<script type="text/javascript">
	function validarhora(){
		var objHdesde = document.getElementById('Hdesde');
		var objHhasta = document.getElementById('Hhasta');
		if(objHdesde.value >= objHhasta.value){
			var hora_max = parseInt(objHdesde.value.substr(0,2)) + 1;
			var min_max = objHdesde.value.substr(3,2);
			event.target.setCustomValidity('La fecha inicial no puede ser mayor la final');
			objHhasta.value =  hora_max.toString()+":"+min_max;
		}
		if(objHhasta.value <= objHdesde.value){
			var hora_min = parseInt(objHhasta.value.substr(0,2)) + 1;
			var min_min = objHhasta.value.substr(3,2);
			event.target.setCustomValidity('La fecha final no puede ser mayor la inicial');
			objHdesde.value =  hora_min.toString()+":"+min_min ;
		}
	}


</script>
</body>
</html>