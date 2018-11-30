<?php 	
/* estamos en Models/mEditarCancha.php*/

require '../views/vEditarCancha.php';

class mEditarCancha extends Model {

	public function CargarCancha($id){
		$this->db->query("SELECT can.idcancha, can.descripcion as nombre, can.valor, dep.iddeporte, dep.descripcion as deporte, can.discontinuado FROM cancha as can 
								INNER JOIN deporte as dep on dep.iddeporte = can.deporte_iddeporte
								WHERE can.idcancha = $id");
			return $this->db->fetchALL();
	}

	public function CargarDeporte(){
		$this->db->query("SELECT iddeporte, descripcion as deporte FROM deporte WHERE discontinuado = 0");
			return $this->db->fetchALL();
	}

	public function EditarCancha($nom, $valor,$iddeporte, $id){
			$this->db->query("UPDATE cancha SET descripcion = $nom, valor = $valor, deporte_iddeporte =  $iddeporte WHERE cancha.idcancha = $id");
			return 0;

		}
}

?>
