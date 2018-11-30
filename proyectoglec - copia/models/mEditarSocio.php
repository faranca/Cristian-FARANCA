<?php 	
/* estamos en Models/mEditarSocio.php*/

require '../views/vEditarSocio.php';

class mEditarSocio extends Model {

	public function CargarSocio($id){
		$this->db->query("SELECT idpersona, nombre, apellido, fecha_nacimiento as nac, dni, usuario as user, clave, email, discontinuado 
			FROM usuario 
			WHERE idpersona = $id");
			return $this->db->fetchALL();
	}


	public function EditarSocio($nom, $ape,$nac,$dni,$user,$pass,$mail,$id){
			$this->db->query("UPDATE usuario SET nombre ='".$nom."', apellido = '".$ape."', fecha_nacimiento = ".$nac.", dni = ".$dni.", usuario = '".$user."', clave = '".$pass."', email = '".$mail."' WHERE idpersona = ".$id);
			return 0;

		}
}

?>
