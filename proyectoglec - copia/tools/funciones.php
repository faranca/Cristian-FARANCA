<?php 

// Funcion que recibe un numero entero
// y retorna el dia de la semana
function intToDayName($numeroDia){
		$Nombre = '';
		switch ($numeroDia) {
			case 1:
				$Nombre = "Lunes";
				break;
			case 2:
				$Nombre = "Martes";
				break;
			case 3:
				$Nombre = "Miercoles";
				break;
			case 4:
				$Nombre = "Jueves";
				break;
			case 5:
				$Nombre = "Viernes";
				break;
			case 6:
				$Nombre = "Sabado";
				break;
			case 7:
				$Nombre = "Domingo";
				break;
		}
	return $Nombre;
	}
 ?>