<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<title>Cobro</title>
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
			<?php 						
				foreach($this->BuscarCajaA as $a){ 
				    if($a[0] ==0 ){
				     	if (isset($_POST['TipoCobro'])) {//sacar cuando termine reserva
							if($_POST['TipoCobro']=="Cuota"){
								$idcomp = $this->CobrarCuota;
							}
							if($_POST['TipoCobro']=="Reserva"){
								$idReserva = $this->CobrarReserva;
								
							}
							if($_POST['TipoCobro']=="Inscripcion"){
								$idReserva = $this->CobrarInscripcion;
								
						}
						} ?>

							
							<?php 
							$comp=$this->getCPB;
							$dato=$this->getPagos;
							 $dato1= 'dato='.urlencode(serialize($dato));
							 $comp1= '&comp='.urlencode(serialize($comp));
							?>

							 
	
		

				<a href="cComprobante.php?<?= $dato1.$comp1 ?>" target="_blank"><button type="button">Imprimir comprobante</button></a>
				<?php 	if(isset($_POST['TipoCobro'])){
							if($_POST['TipoCobro'] == "Reserva"){ ?>
					<form action="" method="POST">
						<select name="idInsumo">
							<?php 
							foreach($this->InsumoDisponible as $i){ ?>
							<option value="<?= $i["idinsumo"] ?>"><?= $i["descripcion"]." - $". $i['precio'] . " - Stock: ". $i['cantidad'] ?></option>
							<?php } ?>
						</select>
						<input type="hidden" name="TipoCobro" value="ReservaInsumo">
						<input type="number" name="cantidad" min="0" placeholder="cant" class="campo_s">
						<button type="submit" name="btnBuscar">Agregar insumo</button>
						</form>
				<?php 	}}	} else { 
								echo "CAJA CERRADA"; 
							  } } ?>
	</div></div></div>
</div>
</body>
</html>
