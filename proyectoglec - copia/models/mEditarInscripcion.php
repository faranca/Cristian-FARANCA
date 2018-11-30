<?php 	
/* estamos en Models/mEditarInscripcion.php*/

require '../views/vEditarInscripcion.php';

class mEditarInscripcion extends Model {

	public function CargarInscripcion($id){
		$this->db->query("SELECT idinscripcion, fecha_alta as fecha, fecha_baja, usuario_idpersona as idpersona, actividad_idactividad as idactividad 
			FROM inscripcion WHERE idinscripcion = $id");
			return $this->db->fetchALL();
	}


	public function EditarInscripcion($idPersona, $idActividad, $id){
			$this->db->query("UPDATE inscripcion SET fecha_alta = NOW(), usuario_idpersona = $idPersona, actividad_idactividad = $idActividad WHERE inscripcion.idinscripcion = $id");
			return 0;

		}
}

?>
