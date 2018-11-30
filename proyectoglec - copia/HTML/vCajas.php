<?php 

/*
	session_start();		
		if (!isset($_SESSION['logUSR']))
			{
				header('Location:../HTML/vLogin.php');

				exit();
			};

if(!isset($_SESSION['login'])) header("Location:login");

	    if(isset($_GET['monto']))
	    	{
		     	header("location:./cCaja.php");

			}*/


?>
<!---->


<!DOCTYPE html>
<html>
<head>
	<title>Caja</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
<div class="bg">
	<div id="menu">
		<?php include 'vMenu.php' ?>
	</div>
	<div id="contenido">
		<form id = "caja">
			<div class = "contenedor">
				<div class = "titulo_form">
					<a class="tituloa"> Caja </a>
				</div>
				<div class = "contenido_form">
					<div class="encabezado_lista">
						<table>
							<tr>
								<th class="campo_xxl">Hora</th>
								<th class="campo_xxxl">Detalle</th>
								<th class="campo_m">Entrada</th>
								<th class="campo_m">Salida</th>
								<th class="extra"/>
							</tr>
						</table>
					</div>
					<?php
						foreach($this->BuscarCajaA as $a){ 
						if($a ==0 ) {
							$fechaV = "2000-01-01"; 
					?>
					

					<nav class ="scroll">
						
							<?php 
							foreach($this->BuscarMovimientos as $b){
							if($b["fecha"] > $fechaV)
							{?>
								<table>
									<tr class='movF' >
										<th class="campo_g"><?= substr($b["fecha"],8,2)."/".substr($b["fecha"],5,2)."/".substr($b["fecha"],0,4)	?></th>
									</tr> 
								</table>															
							<table>		
							<?php }?>						
								<tr class='mov<?= $b["tipo"] ?>' >
									<td class="campo_xxl"> <?= $b["hora"] ?></td>
									<td class="campo_xxxl"><?= $b["detalle"] ?></td>
									<td class="campo_m"><?= $b["ingreso"] ?></td>
									<td class="campo_m"><?= $b["egreso"] ?></td>							
								</tr> 
							<?php $fechaV = $b["fecha"];
							}?>
						</table>
					</nav>
					<!--<a class="Peso"></a>-->
					<div class="monto_final">
							<?php 
									foreach($this->CalculaCaja as $e){ 
											$monto_final= $e["Suma"] + $e["Inicio"] - $e["Resta"];
							?>
						<input type="text" name="total" class="total" value="$<?= $monto_final  ?>">
							<?php } ?>
					</div>
				</div>
				<div class="botones_accion_form">
					<button class= "primerbotoncaja" type="button" onclick="window.location.href='./cCuota.php'"> Cuota </button>
					<button class= "botoncaja" type="button" onclick="window.location.href='./cInsumo.php'"> Insumos </button>
					<button class= "botoncaja" type="button" onclick="window.location.href='./cReserva.php'"> Reserva </button>
					<button class= "botoncaja" type="button" onclick="window.location.href='./cGastosvarios.php'"> Gastos varios </button>
					<button class= "botoncaja" type="button" onclick="window.location.href='./cAportes.php'"> Aporte </button>
					<button class= "botoncaja" type="button" onclick="window.location.href='./cRetiros.php'"> Retiro </button>
					<button class= "botoncaja" type="button" onclick="window.location.href='./cCierrecaja.php?monto_final= <?= $monto_final ?>'"> Cerrar Caja </button>
					<?php
						}

						
						else { ?>

					<nav class ="scroll">
						<table>
							<tr>
								<td class="campo_xxl"> - </td>
								<td class="campo_xxxl"> - </td>
								<td class="campo_m">0.00</td>
								<td class="campo_m">0.00</td>
							</tr>
						</table>
					</nav>
					<!--<a class="Peso"></a>-->
					<input type="text" name="total" class="total" value="Cerrada">
				</div>
				<div class="botones_accion_form">

					<form action="" method="GET"> 
					<a>$</a><input type="text" name="monto" placeholder="Monto inicial">
					<button onclick="Verificar()" type="submit">Abrir Caja</button>
					</form>

					<?php /* <button type="button" onclick="window.location.href='./vAbrircaja.php'"> Abrir Caja </button>  */ ?> 

							<?php
					} }?>

					
					<script language="JavaScript"> 
					function Verificar(){ 
					    if (confirm('¿Seguro que desea Abrir la caja?')){ 
					       document.tuformulario.submit() 
					    } 
					} 
					</script>



				</div>
			</div>
		</form>
	</div>
</div>
</body>
</html>