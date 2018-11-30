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
			<a class="tituloa">Monto que adeudan de las Reservas</a>
		</div>
		<div class = "contenido_form">
			<div class="busqueda">

			</div>
			<div class="encabezado_lista">
				<table>
					<tr>
						<th class="campo_l">Dia</th>
						<th class ="campo_m">Cancha</th>
						<th class ="campo_l">Hora Inicio</th>
						<th class ="campo_l">Hora Fin</th>
						<th class ="campo_s">Importe</th>
						<th class ="campo_m">Nombre</th>
						<th class ="campo_xxl">Tipo de Factura</th>
						<th class ="campo_s">Borrar</th>
						<th class="extra"/>
					</tr>
				</table>
			</div>
			<nav class ="scroll">
				<table class="lista">
					<?php  
							foreach($this->BuscarDebedeReserva as $r){ 
									$minuto = substr($r["hora_hasta"],3,2) - substr($r["hora_desde"],3,2);
									if($minuto<0) {$minuto = $minuto + 60;}
									$date = (substr($r["hora_hasta"],0,2) - substr($r["hora_desde"],0,2)) + ($minuto/60);
									$importe = (($r["valor"] * $date) + $r["insumo"])-$r["pago"];
									if($importe > 0){ ?>
							<tr>
								<td class="campo_l"><?= $r["fecha_reserva"] ?></td>
								<td class="campo_m"><?= $r["descripcion"] ?></td>
								<td class="campo_l"><?= $r["hora_desde"] ?></td>
								<td class="campo_l"><?= $r["hora_hasta"] ?></td>
								<td class="campo_s">$<?= $importe ?></td>
								<td class="campo_m"><?= $r["nombre"] ?></td>
								<td class="campo_xxl">
									<a href="./cCobro.php?idReserva=<?= $r['idreserva']?>&Tipo=A&Importe=<?= $importe ?>&TipoCobro=RestoReserva&Descripcion=Cobro Resto Reserva <?= $r["nombre"] . " ". $r["fecha_reserva"] ?> ">A</a> - 
									<a href="./cCobro.php?idReserva=<?= $r['idreserva']?>&Tipo=B&Importe=<?= $importe ?>&TipoCobro=RestoReserva&Descripcion=Cobro Resto Reserva <?= $r["nombre"] ." ". $r["fecha_reserva"] ?> ">B</a> - 
									<a href="./cCobro.php?idReserva=<?= $r['idreserva']?>&Tipo=C&Importe=<?= $importe ?>&TipoCobro=RestoReserva&Descripcion=Cobro Resto Reserva <?= $r["nombre"] ." ". $r["fecha_reserva"] ?> ">C</a></td>
								<td class="campo_s"><a href="./cBorrar.php?id=<?= $r["idreserva"] ?>&link=Reserva">
										<IMG SRC="../img/delete.png" WIDTH=15 HEIGHT=15></IMG>
										</a></td>	
							</tr> 
							<?php } }?>
				</table>
			</nav>
						
		</div>
		<div class="botones_accion_form">


			
			<button type="button" class="boton_Cancelar" onclick="window.location.href='cReserva.php'">Volver</button> 
		</div>
	</div>

</div>
</div>
</body>
</html>