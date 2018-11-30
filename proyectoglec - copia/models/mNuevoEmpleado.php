<?php

/* estamos en Models/mNuevoEmpleado.php*/

require '../views/vNuevoEmpleado.php';

class mNuevoEmpleado extends Model {

	public function NuevoEmpleado($nom, $ape,$nac,$dni,$user,$pass1,$mail){

				$this->db->query("INSERT INTO usuario (nombre, apellido, fecha_nacimiento, dni, usuario, clave, email, esAdmin, discontinuado)
									VALUES ($nom, $ape,$nac,$dni,$user,$pass1,$mail, 1, '0');");
			return 0;

		}
}

?>
