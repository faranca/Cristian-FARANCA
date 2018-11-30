<?php 	
/* estamos en Models/mEditarInsumos.php*/

require '../views/vEditarInsumos.php';

class mEditarInsumos extends Model {

	public function CargarInsumos($id){
		$this->db->query("SELECT ins.idinsumo, ins.descripcion as nombre, ins.stock, ins.precio, ins.deporte_iddeporte as iddeporte, dep.descripcion as deporte, ins.discontinuado 
							FROM insumo as ins 
							INNER JOIN deporte as dep ON dep.iddeporte = ins.deporte_iddeporte
							WHERE ins.idinsumo = $id");
			return $this->db->fetchALL();
	}

	public function EditarInsumos($nom, $id ,$stock, $precio, $iddeporte){
			$this->db->query("UPDATE insumo SET descripcion = $nom, precio = $precio, stock = $stock, deporte_iddeporte = $iddeporte WHERE insumo.idinsumo = $id");
			return 0;

		}

	public function ListarDeportes(){
			$this->db->query("SELECT dep.iddeporte, dep.descripcion as deporte, dep.discontinuado FROM deporte as dep 
								WHERE dep.discontinuado = 0");
			
			return $this->db->fetchALL();
		}
}

?>
