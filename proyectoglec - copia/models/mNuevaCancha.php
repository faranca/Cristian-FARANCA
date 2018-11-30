<?php 	
/* estamos en Models/mNuevaCancha.php*/

require '../views/vNuevaCancha.php';

class mNuevaCancha extends Model {

	public function NuevaCancha($nom, $valor, $iddeporte){

				$this->db->query("INSERT INTO cancha (idcancha, descripcion, valor, deporte_iddeporte, discontinuado) VALUES (NULL, $nom, $valor, $iddeporte, '0')");
			return 0;

	}

	public function CargarDeporte(){
		$this->db->query("SELECT iddeporte, descripcion as deporte FROM deporte WHERE discontinuado = 0");
			return $this->db->fetchALL();
	}
}

?>
