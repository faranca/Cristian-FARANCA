<?php 	
/* estamos en Models/mListaInsumos.php*/

require '../views/vListarInsumos.php';

class mListarInsumos extends Model {

	public function ListarInsumos($dato)
		{
			$this->db->query("SELECT ins.idinsumo, ins.descripcion as nombre, ins.stock, ins.precio, ins.deporte_iddeporte, dep.descripcion as deporte, ins.discontinuado 
								FROM insumo as ins
								INNER JOIN deporte as dep ON dep.iddeporte = ins.deporte_iddeporte 
								WHERE ins.descripcion LIKE $dato");
			
			return $this->db->fetchALL();

		}

	public function ListaInsumos()
		{
			$this->db->query("SELECT ins.idinsumo, ins.descripcion as nombre, ins.stock, ins.precio, ins.deporte_iddeporte, dep.descripcion as deporte,ins.discontinuado 
								FROM insumo as ins 
								INNER JOIN deporte as dep ON dep.iddeporte = ins.deporte_iddeporte 
								WHERE 1");
			
			return $this->db->fetchALL();

		}

}

?>
