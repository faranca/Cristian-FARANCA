<?php 	
/* estamos en Models/mNuevoSocio.php*/

require '../views/vNuevoSocio.php';

class mNuevoSocio extends Model {

	public function NuevoSocio($nom, $ape,$nac,$dni,$user,$pass,$mail){

				$this->db->query("INSERT INTO usuario (nombre, apellido, fecha_nacimiento, dni, usuario, clave, email, esAdmin, discontinuado)
									VALUES ($nom, $ape,$nac,$dni,$user,$pass,$mail, 0, '0');");
			return 0;

		}
}

?>
