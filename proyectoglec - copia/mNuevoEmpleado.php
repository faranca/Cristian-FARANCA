<?php 	
/* estamos en Models/mNuevoEmpleado.php*/

require '../views/vNuevoEmpleado.php';

class mNuevoEmpleado extends Model {

	public function NuevoEmpleado($dato)
	
		{
			$this->db->query("
			
			INSERT INTO usuario (nombre, apellido, fecha_nacimiento, dni, usuario, clave, email, esAdmin, discontinuado)
			VALUES ($dato, '1', '0');
			
			
			");
			return $this->db->fetchALL();

		}
}

?>
