<?php 	
/* estamos en Models/mEditarDeporte.php*/

require '../views/vEditarDeporte.php';

class mEditarDeporte extends Model {

	public function CargarDeporte($id){
		$this->db->query("SELECT dep.iddeporte, dep.descripcion as nombre, dep.discontinuado FROM deporte as dep 
							WHERE dep.iddeporte = $id");
			return $this->db->fetchALL();
	}

	public function EditarDeporte($nom, $id){
			$this->db->query("UPDATE deporte SET descripcion = $nom WHERE deporte.iddeporte = $id");
			return 0;

		}
}

?>
