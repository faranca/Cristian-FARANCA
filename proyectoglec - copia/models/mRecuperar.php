<?php 	

require '../views/vRecuperar.php';
	/* Contiene la informacion de configuracion general del sistema */
	class mRecuperar extends Model {

		/* Des-discontinua Personas*/
		public function RecuperarPersona($id){
			
			$this->db->query(" UPDATE `usuario` SET `discontinuado` = '0' WHERE `usuario`.`idpersona` = $id; ");
			return 0;			
		}

		/* Des-discontinua Insumos*/
		public function RecuperarInsumos($id){
			
			$this->db->query(" UPDATE `insumo` SET `discontinuado` = '0' WHERE `insumo`.`idinsumo` = $id; ");
			return 0;			
		}

		/* Des-discontinua Actividades*/
		public function RecuperarActividades($id){
			
			$this->db->query(" UPDATE `actividad` SET `discontinuada` = '0' WHERE `actividad`.`idactividad` = $id; ");
			return 0;			
		}

		/* Des-discontinua Canchas*/
		public function RecuperarCanchas($id){
			
			$this->db->query(" UPDATE `cancha` SET `discontinuado` = '0' WHERE `cancha`.`idcancha` = $id; ");
			return 0;			
		}

		/* Des-discontinua Deportes*/
		public function RecuperarDeportes($id){
			
			$this->db->query(" UPDATE `deporte` SET `discontinuado` = '0' WHERE `deporte`.`iddeporte` = $id; ");
			return 0;			
		}

		/* Des-discontinua Inscripcion*/
		public function RecuperarInscripcion($id){
			if($id=="") throw new Exception('error');
			if(!is_numeric($id)) throw new Exception('error');
		
			$this->db->query("UPDATE `inscripcion` SET `fecha_alta` = NOW(), `fecha_baja` = NULL WHERE `inscripcion`.`idinscripcion` = $id; ");
			return 0;			
		}
	}
?>