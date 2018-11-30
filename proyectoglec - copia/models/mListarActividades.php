<?php 	
/* estamos en Models/mListarActividades.php*/

require '../views/vListarActividades.php';

class mListarActividades extends Model {

	public function ListarActividades($dato)
		{
			$this->db->query("SELECT act.idactividad, act.descripcion as nombre, act.precio, can.descripcion as cancha, act.discontinuada 
								FROM actividad as act 
								INNER JOIN cancha as can on can.idcancha = act.cancha_idcancha
								WHERE act.descripcion LIKE $dato");
			
			return $this->db->fetchALL();

		}

	public function ListaActividades()
		{
			$this->db->query("SELECT act.idactividad, act.descripcion as nombre, act.precio, can.descripcion as cancha, act.discontinuada 
								FROM actividad as act 
								INNER JOIN cancha as can on can.idcancha = act.cancha_idcancha
								WHERE 1");
			
			return $this->db->fetchALL();

		}

}

?>
