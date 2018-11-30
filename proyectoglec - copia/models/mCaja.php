<?php 	

require '../views/vCaja.php';
/* Contiene la informacion de configuracion general del sistema */
class mCaja extends Model {

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

		/* Buscar los ingresos y egresos de la caja abierta*/
		public function BuscarMovimientos(){
			$ultimaCaja = $this->getUltimaCaja();
			$this->db->query(
				"SELECT i.idingreso as numero,
						i.descripcion_ingreso as detalle, 
						i.importe as ingreso,
						i.hora_ingreso as hora,
						i.fecha as fecha,
						0 as egreso,  
						if(i.idingreso>0,'I','E') as tipo 
				FROM ingreso i 
				WHERE i.caja_idcaja = $ultimaCaja
				UNION ALL
				SELECT e.idegreso as numero,
						e.motivo as detalle, 
						0 as ingreso, 
						e.hora_egreso as hora,
						e.fecha as fecha,
						e.importe as egreso, 
						if(e.idegreso>0,'E','I') as tipo 
				FROM egreso e 
				WHERE e.caja_idcaja = $ultimaCaja
				ORDER by fecha asc, hora asc
				");
			return $this->db->fetchAll();
		}

		/* Busca los ingresos de la caja abierta */
		public function BuscarMovimientosCaja1(){
				$ultimaCaja = $this->getUltimaCaja();
				$this->db->query("SELECT ca1.idcaja, ing.importe, ing.idingreso, ing.descripcion_ingreso
				FROM caja as ca1
				inner join ingreso as ing on ing.caja_idcaja = $ultimaCaja 
				WHERE ca1.idcaja = ing.caja_idcaja
				ORDER BY ca1.idcaja ASC");
				return $this->db->fetchALL();
		}

		/* Busca los egresos de la caja abierta */
		public function BuscarMovimientosCaja2(){
				$ultimaCaja = $this->getUltimaCaja();
				$this->db->query("SELECT ca1.idcaja, egr.importe, egr.idegreso, egr.motivo
				FROM caja as ca1				
				inner join egreso as egr on egr.caja_idcaja = $ultimaCaja 
				WHERE ca1.idcaja = egr.caja_idcaja
				ORDER BY ca1.idcaja ASC");
				return $this->db->fetchALL();
		}

		/* revisa si la caja esta abierta o cerrada */
		public function BuscarCajaAbierta(){
				$ultimaCaja = $this->getUltimaCaja();
				$this->db->query("SELECT COUNT(idcaja) as caja FROM caja WHERE idcaja = $ultimaCaja AND fecha_cierre IS NOT NULL");
				return $this->db->fetch();
		}


		/* abre una nueva caja */
		public function AbrirCaja($monto_inicial){
				if($monto_inicial=="") throw new Exception('error');
				if($monto_inicial<0) throw new Exception('error');
				if(!is_numeric($monto_inicial)) throw new Exception('error');	

				$this->db->query("INSERT INTO `caja` (`idcaja`, `monto_inicial`, `fecha_apertura`, `hora_apertura`, `monto_final`, `fecha_cierre`, `hora_cierre`, `usuario_idpersona`) VALUES (NULL, $monto_inicial, NOW(), TIME(NOW()), NULL, NULL, NULL, '1') ");
					
				return 0;
		} //cargar id persona = $_SESSION['idpersona']



	}



?>