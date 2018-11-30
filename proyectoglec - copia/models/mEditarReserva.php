<?php 	
/* estamos en Models/mEditarReserva.php*/

require '../views/vEditarReserva.php';

class mEditarReserva extends Model {

	
	public function EditarReserva($nombre, $dni, $telefono, $observacion, $id){
			$this->db->query("UPDATE `reserva` SET `nombre` = $nombre, `dni` = $dni, `telefono` = $telefono, `observacion` = $observacion WHERE `reserva`.`idreserva` = $id");
			return 0;

		}

	public function CargarReserva($id){
					$this->db->query("SELECT idreserva, nombre, dni, telefono ,observacion  FROM reserva WHERE idreserva = $id");
			return $this->db->fetchALL();

		}
}

?>
