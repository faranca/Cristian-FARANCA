<?php 	

require '../views/vGastosvarios.php';
/* Contiene la informacion de configuracion general del sistema */
class mGastosvarios extends Model {

		/* Obtiene la ultima caja*/
		public function getUltimaCaja(){
			$this->db->query("Select MAX(idcaja) as idcaja from caja");
			$numeroCaja = $this->db->fetch();	
			return $numeroCaja["idcaja"];
		}

		/* devuelve la suma de ingresos, la suma de egresos y el monto inicial de la caja abierta */
		public function CalcularCaja(){
				$ultimaCaja = $this->getUltimaCaja();
				$this->db->query("
					SELECT (
							SELECT SUM(ing.importe) as suma 
							FROM ingreso as ing 
							WHERE ing.caja_idcaja = $ultimaCaja) AS Suma,
							(
							SELECT SUM(egr.importe) as resta 
							FROM egreso as egr 
							WHERE egr.caja_idcaja = $ultimaCaja) AS Resta, 
							caj.monto_inicial as Inicio
					FROM caja as caj
					WHERE caj.idcaja = $ultimaCaja");
				
				return $this->db->fetchALL();
		}

		/* Registra el retiro*/
		public function RegistrarGastosvarios($monto, $descripcion){
			if($monto == "") throw new Exception('Error, Monto esta vacio.');
			if($monto < 0) throw new Exception('Error, monto negativo o cero.');
			if(!is_numeric($monto)) throw new Exception('Error, monto no valido.');

			if($descripcion == "") throw new Exception('Error, descripcion esta vacio.');

			$ultimaCaja = $this->getUltimaCaja();
			$monto = "'" . $monto . "'";
			$descripcion = "'Gastos varios: " . $descripcion . "'";
			$this->db->query("INSERT INTO egreso (idegreso, importe, motivo, fecha, caja_idcaja, hora_egreso) VALUES (NULL, $monto, $descripcion, NOW(), $ultimaCaja, TIME(NOW()))");
			return 0;
			
			
		}


	}
?>