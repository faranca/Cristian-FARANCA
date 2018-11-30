<?php 	
/* estamos en Models/mListaEmpleados.php*/

require '../views/vListaEmpleados.php';

class mListaEmpleados extends Model {

	public function ListaEmpleados($dato)
		{
		

			$this->db->query("SELECT idpersona, nombre, apellido, dni, esAdmin, discontinuado FROM usuario  
								WHERE nombre LIKE '%".$dato."%'
								OR apellido LIKE '%".$dato."%'
								OR dni = '$dato'
								having esAdmin = 1
								");
			
			return $this->db->fetchALL();

		}

}

?>
