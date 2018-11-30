<?php 	

require '../views/vBorrar.php';
	/* Contiene la informacion de configuracion general del sistema */
	class mBorrar extends Model {

		/* Discontinua Personas*/
		public function BorrarPersona($id){
			if($id=="") throw new Exception('error');
			if(!is_numeric($id)) throw new Exception('error');
			
			$this->db->query(" UPDATE `usuario` SET `discontinuado` = '1' WHERE `usuario`.`idpersona` = $id;");
			return 0;			
		}

		/* Discontinua Insumos*/
		public function BorrarInsumos($id){
			if($id=="") throw new Exception('error');
			if(!is_numeric($id)) throw new Exception('error');
			
			$this->db->query(" UPDATE `insumo` SET `discontinuado` = '1' WHERE `insumo`.`idinsumo` = $id;");
			return 0;			
		}

		/* Discontinua Actividades*/
		public function BorrarActividades($id){
			if($id=="") throw new Exception('error');
			if(!is_numeric($id)) throw new Exception('error');
			
			$this->db->query(" UPDATE `actividad` SET `discontinuada` = '1' WHERE `actividad`.`idactividad` = $id;");
			return 0;			
		}

		/* Discontinua Canchas*/
		public function BorrarCanchas($id){
			if($id=="") throw new Exception('error');
			if(!is_numeric($id)) throw new Exception('error');
			
			$this->db->query(" UPDATE `cancha` SET `discontinuado` = '1' WHERE `cancha`.`idcancha` = $id;");
			return 0;			
		}

		/* Discontinua Deportes*/
		public function BorrarDeportes($id){
			if($id=="") throw new Exception('error');
			if(!is_numeric($id)) throw new Exception('error');
		
			$this->db->query(" UPDATE `deporte` SET `discontinuado` = '1' WHERE `deporte`.`iddeporte` = $id;");
			return 0;			
		}

		/* Discontinua Inscripcion*/
		public function BorrarInscripcion($id){
			if($id=="") throw new Exception('error');
			if(!is_numeric($id)) throw new Exception('error');
		
			$this->db->query("UPDATE `inscripcion` SET `fecha_baja` = NOW() WHERE `inscripcion`.`idinscripcion` = $id;");
			return 0;			
		}

		public function BorrarHorarioActividad($id){
			if($id=="") throw new Exception('error');
			if(!is_numeric($id)) throw new Exception('error');
			
			$this->db->query("DELETE FROM actividad_idactividad WHERE idhorario_de_actividad = $id");
			return 0;
		}

		/* Borrar Reserva */
		public function BorrarReserva($id){
			if($id=="") throw new Exception('error');
			if(!is_numeric($id)) throw new Exception('error');
		
			$this->db->query("DELETE FROM `ingreso_por_reserva` WHERE `ingreso_por_reserva`.`reserva_idreserva` = $id;");

			$this->db->query("DELETE FROM `reserva` WHERE `reserva`.`idreserva` = $id;");
			return 0;			
		}
		

	}
?>