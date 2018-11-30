<?php 	
/* estamos en Models/mListaInscripcion.php*/

require '../views/vListarInscripcion.php';

class mListarInscripcion extends Model {

	public function ListaSocios($dato){
		

			$this->db->query("SELECT idpersona, nombre, apellido, dni, esAdmin, discontinuado FROM usuario  
								WHERE nombre LIKE '%".$dato."%'
								OR apellido LIKE '%".$dato."%'
								OR dni = '$dato'
								having esAdmin = 0 and discontinuado = 0
								");
			
			
			return $this->db->fetchALL();

		}

	public function ListarInscNoEsta($id){

		$this->db->query("SELECT act.idactividad, act.descripcion, act.precio FROM actividad as act
							WHERE act.idactividad NOT IN (SELECT acc.idactividad FROM actividad as acc 
								                         INNER JOIN inscripcion as inc on acc.idactividad = inc.actividad_idactividad
								                         where inc.usuario_idpersona = $id 
								                         and inc.fecha_baja IS NULL and acc.discontinuada=0)");
							
			return $this->db->fetchALL();
	}

	public function ListarInscEsta($id){
				
		$this->db->query("SELECT ins.idinscripcion, act.idactividad, act.descripcion, act.precio, ins.fecha_baja FROM inscripcion as ins
							INNER JOIN actividad as act ON ins.actividad_idactividad = act.idactividad
							where ins.fecha_baja IS NULL and ins.usuario_idpersona = $id");
							
			return $this->db->fetchALL();
	}

}

?>
