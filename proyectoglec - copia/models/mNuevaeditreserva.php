<?php 	

require '../views/vNuevaeditreserva.php';
/* Contiene la informacion de configuracion general del sistema */
class mNuevaeditreserva extends Model {

		/*public function getUltimaReserva(){
			$this->db->query("SELECT MAX(idreserva) as idreserva from reserva LIMIT 1");
			$numeroReserva = $this->db->fetch();
			return $numeroReserva["idreserva"];
		}*/

		/*public function BuscarCancha(){

			$this->db->query("SELECT idcancha, descripcion, valor FROM cancha WHERE discontinuado = 0");
			return $this->db->fetchALL();
		
		}*/
		
		/*public function NuevaReserva($nombre, $dni, $idcancha, $fecha, $hora_desde, $hora_hasta, $telefono, $observacion){
							
			$this->db->query("INSERT INTO reserva (idreserva, nombre, dni, telefono, observacion, cancha_idcancha, fecha_reserva, hora_desde, hora_hasta) 
				VALUES (NULL, $nombre, $dni, $telefono, $observacion, $idcancha, $fecha, $hora_desde, $hora_hasta)");
			
			return 0;
		}*/

		}



?>