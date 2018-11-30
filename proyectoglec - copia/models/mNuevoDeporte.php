<?php 	
/* estamos en Models/mNuevaDeporte.php*/

require '../views/vNuevoDeporte.php';

class mNuevoDeporte extends Model {

	public function NuevoDeporte($nom){

				$this->db->query("INSERT INTO deporte (iddeporte, descripcion, discontinuado) VALUES (NULL, $nom, '0')");
			return 0;

	}
}

?>
