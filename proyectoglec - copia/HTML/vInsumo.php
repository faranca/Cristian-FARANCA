<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Insumos</title>
</head>
<body>
<div class="bg">
	<div id="menu">
		<?php include 'vMenu.php' ?>
	</div>
	<div id="contenido">
		<div class = "contenedor">
			<div class = "titulo_form">
				<a class="tituloa">Alquiler de Insumos</a>
			</div>

			<div class = "contenido_form">
				<div class="busqueda">
					<form action="" method="POST">
						<input type="text" name="txtInsumo" placeholder="Insumo">
						<button type="submit" name="btnBuscar"></button>
						<fieldset>
							<legend>Filtros</legend>
							<input type="date" name="fecha_reserva" class="fechal" value="2018-11-24" required>
							<input type="time" name="Hdesde" class="fechal" placeholder="Desde" value="09:30" step="1800" required>
							<input type="TIME" name="Hhasta" class="fechal" placeholder="Hasta" value="10:30" step="1800" required>
							<select name="iddeporte">
								<?php foreach($this->BuscarDeporte as $c){ ?>
									<option value="<?= $c["iddeporte"] ?>"><?= $c["descripcion"] ?></option>
								<?php } ?>
							</select>
						</fieldset>
					</form>
				</div>

				<div class="alquilerinsumos">
					<?php if(isset($_POST['Hdesde']) and isset($_POST['Hhasta']) and isset($_POST['fecha_reserva'])){ ?>
						<form action="" method="post">
							<input type="number" min="0" class="campo_m" name="cantidad" placeholder="Cantidad" required>
							<select name="idInsumo">
								<?php foreach($this->InsumoDisponible as $b){
									if($b["cantidad"]>0){ ?>
								<option value="<?= $b["idinsumo"] ?>"><?= $b["nombre"]." - (Disp.: ".$b["cantidad"].")" ?></option>
								<?php } }?>
							</select>
							<select name="idReserva">
								<?php foreach($this->BuscarReserva as $r){ ?>
									<option value="<?= $r["idreserva"] ?>"><?= $r["nombre"] ?></option>
								<?php } ?>
							</select> </br > </br >
							<button class="botoncaja" type="submit""> Agregar a cancha </button>
						</form>
					<?php } ?>
				</div>
				<div class="botones_accion_form">
					
					<button type="button" class="boton_Cancelar" onclick="window.location.href='cCaja.php'">Volver</button>
				</div>
			</div>
		</div>
	</div>
</div>

</body>

</html>