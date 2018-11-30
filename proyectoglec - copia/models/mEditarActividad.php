<?php 	
/* estamos en Models/mEditarActividad.php*/

require '../views/vEditarActividad.php';

class mEditarActividad extends Model {

	public function CargarActividad($id){
		$this->db->query("SELECT act.idactividad, act.descripcion as nombre, act.precio, can.idcancha, can.descripcion as cancha, act.discontinuada 
								FROM actividad as act 
								INNER JOIN cancha as can on can.idcancha = act.cancha_idcancha
								WHERE act.idactividad = $id
								");
			return $this->db->fetchALL();
	}

	public function CargarCancha(){
		$this->db->query("SELECT idcancha, descripcion as cancha 
							FROM cancha 
							WHERE discontinuado = 0");
							
			return $this->db->fetchALL();
	}

	public function EditarActividad($nom, $precio, $idcancha, $id){
			$this->db->query("UPDATE actividad SET descripcion = $nom, precio = $precio, cancha_idcancha =  $idcancha 
							WHERE actividad.idactividad = $id");
			return 0;

		}
}

?>
