<?php 	
/* estamos en Models/mListaSocios.php*/

require '../views/vListaSocios.php';

class mListaSocios extends Model {

	public function ListaSocios($dato){
		

			$this->db->query("SELECT idpersona, nombre, apellido, dni, esAdmin, discontinuado FROM usuario  
								WHERE nombre LIKE '%".$dato."%'
								OR apellido LIKE '%".$dato."%'
								OR dni = '$dato'
								having esAdmin = 0
								");
			/*$this->db->query("select * from usuario");*/
			
			return $this->db->fetchALL();

		}
}

?>
