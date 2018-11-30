<?php 	
/* estamos en Models/mEditarEmpleado.php*/

require '../views/vEditarEmpleado.php';

class mEditarEmpleado extends Model {

	public function CargarEmpleado($id){
		$this->db->query("SELECT idpersona, nombre, apellido, fecha_nacimiento as nac, dni, usuario as user, clave, email, discontinuado 
			FROM usuario 
			WHERE idpersona = $id");
			return $this->db->fetchALL();
	}


	public function EditarEmpleado($nom, $ape,$nac,$dni,$user,$pass,$mail,$id){
			$this->db->query("UPDATE usuario SET nombre = '".$nom."', apellido = '".$ape."', fecha_nacimiento = ".$nac.", dni = ".$dni.", usuario = '".$user."', clave = '".$pass."', email = '".$mail."' WHERE idpersona = ".$id);
			return 0;

		}
}

?>
