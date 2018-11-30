<?php 	
/* estamos en Models/mListaDeportes.php*/

require '../views/vListarDeporte.php';

class mListarDeportes extends Model {

	public function ListarDeportes($dato)
		{
			$this->db->query("SELECT dep.iddeporte, dep.descripcion as nombre, dep.discontinuado FROM deporte as dep 
								WHERE dep.descripcion LIKE $dato");
			
			return $this->db->fetchALL();

		}

	public function ListaDeportes()
		{
			$this->db->query("SELECT dep.iddeporte, dep.descripcion as nombre, dep.discontinuado FROM deporte as dep 
								WHERE 1");
			
			return $this->db->fetchALL();

		}

}

?>
