<?php 	
/* estamos en Models/mNuevaActividad.php*/

require '../views/vNuevaActividad.php';

class mNuevaActividad extends Model {

	public function NuevaActividad($nom, $precio, $idcancha){

				$this->db->query("INSERT INTO Actividad (idActividad, descripcion, precio, cancha_idcancha, discontinuada) 
				VALUES (NULL, $nom, $precio, $idcancha, '0')");
			return 0;

	}

	public function CargarCancha(){
		$this->db->query("SELECT idcancha, descripcion as cancha FROM cancha WHERE discontinuado = 0");
			return $this->db->fetchALL();
	}
}

?>
