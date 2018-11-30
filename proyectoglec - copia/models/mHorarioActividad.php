<?php 	

require '../views/vHorarioActividad.php';
/* Contiene la informacion de configuracion general del sistema */
class mHorarioActividad extends Model {
	public function getHorarioActividadById($idActividad){
		$this->db->query("SELECT dia, hora_inicio, hora_fin, idhorario_de_actividad as idhorario FROM horario_de_actividad
							where actividad_idactividad =".$idActividad);
		return $this->db->fetchALL();
	}

	public function setNuevoHorario($idActividad,$horaini,$horahasta,$dia){
		$this->db->query("INSERT INTO horario_de_actividad(actividad_idactividad,hora_inicio,
		hora_fin,dia) values(".$idActividad.",'".$horaini."','".$horahasta."',".$dia.")");
	}

	public function delHorarioActividadById($idactividad,$idHorario){
		$this->db->query("DELETE FROM horario_de_actividad WHERE actividad_idactividad=".$idactividad." and idhorario_de_actividad=".$idHorario);
	}
}
?>