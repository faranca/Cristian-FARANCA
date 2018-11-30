<?php 	

require '../views/vCierrecaja.php';
/* Contiene la informacion de configuracion general del sistema */
class mCierrecaja extends Model {

		/* Obtiene la ultima caja*/
		public function getUltimaCaja(){
			$this->db->query("Select MAX(idcaja) as idcaja from caja");
			$numeroCaja = $this->db->fetch();	
			return $numeroCaja["idcaja"];
		}


		/* Cierra la ultima caja*/
		public function Cierrecaja($monto_final){
			$ultimaCaja = $this->getUltimaCaja();
			/* $monto_final= "'" . $monto_final . "'";*/
			$this->db->query(" UPDATE `caja` SET `monto_final` = $monto_final, `fecha_cierre` = NOW(), `hora_cierre` = TIME(NOW()) WHERE `caja`.`idcaja` = $ultimaCaja; ");
			return 0;
			
			
		}





	}



?>