<?php

//$query= "SELECT * FROM usuario WHERE usuario='" . $nombreusr . "' AND clave= '" . $claveusr ."'"; 

class mLogin extends Model {
		// creo una funcion para obtener el usuario(despues la llamo desde otro archivo)
		public function validarUsuario($usuario){
				$usuario = substr($usuario, 0, 45);
				$usuario = $this->db->escape($usuario);
				
				/* Consulta */
				//$this->db->query("SELECT idpersona, nombre, clave FROM usuario WHERE usuario ='".$usuario."'");
				//$this->db->query("SELECT * FROM usuario WHERE usuario='" . $nombreusr . "' AND clave= '" . $claveusr ."'");
				$this->db->query("SELECT usuario,clave, nombre FROM usuario WHERE usuario='" . $usuario . "' and discontinuado = false");
				if($this->db->numRows($this->db) == 1){
					return $this->db->fetch();
				}
		}

	public function getPersonaById($id){
			if(!ctype_digit($id)) throw new Exception;
			if($id <= 0) throw new Exception;

			$this->db->query("SELECT nombre FROM usuario WHERE idpersona =".$id);
				if($this->db->numRows($this->db) == 1){
					return $this->db->fetch();
				}
		}
	}
?>



