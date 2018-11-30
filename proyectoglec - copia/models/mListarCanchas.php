<?php 	
/* estamos en Models/mListaCanchas.php*/

require '../views/vListarCanchas.php';

class mListarCanchas extends Model {

	public function ListarCanchas($dato)
		{
			$this->db->query("SELECT can.idcancha, can.descripcion as nombre, can.valor, dep.descripcion as deporte, can.discontinuado FROM cancha as can 
								INNER JOIN deporte as dep on dep.iddeporte = can.deporte_iddeporte
								WHERE can.descripcion LIKE $dato");
			
			return $this->db->fetchALL();

		}

	public function ListaCanchas()
		{
			$this->db->query("SELECT can.idcancha, can.descripcion as nombre, can.valor, dep.descripcion as deporte, can.discontinuado FROM cancha as can 
								INNER JOIN deporte as dep on dep.iddeporte = can.deporte_iddeporte
								WHERE 1");
			
			return $this->db->fetchALL();

		}
	public function getCanchas(){
		$this->db->query("SELECT idcancha, descripcion from cancha");
		return $this->db->fetchALL();
	}
}

?>
