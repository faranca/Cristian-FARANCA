<?php 	
/* estamos en Models/mNuevaInsumos.php*/

require '../views/vNuevoInsumos.php';

class mNuevoInsumos extends Model {

	public function NuevoInsumos($nom, $stock, $precio, $iddeporte){

				$this->db->query("INSERT INTO `insumo` (`idinsumo`, `descripcion`, `stock`, `precio`, `deporte_iddeporte`, `discontinuado`) 
									VALUES (NULL, $nom, $stock, $precio, $iddeporte, '0')");
				//INSERT INTO `insumo` (`idinsumo`, `descripcion`, `stock`, `precio`, `deporte_iddeporte`, `discontinuado`) VALUES (NULL, 'Padel', '5', '350', '2', '0');
			return 0;

	}

	public function ListarDeportes(){
			$this->db->query("SELECT dep.iddeporte, dep.descripcion as deporte, dep.discontinuado FROM deporte as dep 
								WHERE dep.discontinuado = 0");
			
			return $this->db->fetchALL();
		}
}

?>
