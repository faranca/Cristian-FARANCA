<?php 	

require '../views/vAportes.php';
/* Contiene la informacion de configuracion general del sistema */
class mAportes extends Model {

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

				/* Obtiene el ultimo Comprobante*/
		public function getUltimoComprobante($Tipo){
			$Tipo= "'" . $Tipo . "'";
			$this->db->query("SELECT MAX(idcomprobantecfg) as idcomprobante from comprobante_cfg WHERE tipo LIKE $Tipo");
			$idcomprobante = $this->db->fetch();	
			return $idcomprobante["idcomprobante"];
		}

		/* Actualiza los datos del ultimo comprobante del tipo seleccionado*/
		public function UpdateComprobante($Tipo){
			$UltimoComprobante = $this->getUltimoComprobante($Tipo);
			$this->db->query("  UPDATE comprobante_cfg SET ultimo_numero = ultimo_numero+1
							WHERE idcomprobantecfg = $UltimoComprobante");
			return $UltimoComprobante;	
		}

		public function getNumCompr($idCompr){
			$this->db->query("SELECT ultimo_numero from comprobante_cfg where idcomprobantecfg = $idCompr");
			$numero = $this->db->fetch();
			$numero++;	
			return $numero["ultimo_numero"];
		}

		/* Cierra la ultima caja*/
		public function RegistrarAportes($monto, $descripcion){
			if($monto == "") throw new Exception('Error, Monto esta vacio.');
			if($monto < 0) throw new Exception('Error, monto negativo o cero.');
			if(!is_numeric($monto)) throw new Exception('Error, monto no valido.');

			if($descripcion == "") throw new Exception('Error, descripcion esta vacio.');

			$idCompr = $this->UpdateComprobante('C');
			$NumCompr = $this->getNumCompr($idCompr);
			$ultimaCaja = $this->getUltimaCaja();
			$monto = "'" . $monto . "'";
			$descripcion = "'Aporte: " . $descripcion . "'";
			$this->db->query("INSERT INTO `ingreso` (`idingreso`, `fecha`, `importe`, `caja_idcaja`, `numero`, `comprobante_cfg_idcomprobantecfg`, `hora_ingreso`, `descripcion_ingreso`) 
													VALUES (NULL, NOW(), $monto, $ultimaCaja, $NumCompr, $idCompr, TIME(NOW()), $descripcion)");
			return 0;
		}



	}



?>