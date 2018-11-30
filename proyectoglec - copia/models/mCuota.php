<?php 	

require '../views/vCuota.php';
/* Contiene la informacion de configuracion general del sistema */
class mCuota extends Model {

		public function BuscarSocio($dato){				

				$this->db->query("SELECT idpersona, nombre, apellido, dni FROM Usuario 
								WHERE nombre LIKE $dato AND esAdmin = 0 and discontinuado = 0
								OR apellido LIKE $dato AND esAdmin = 0 and discontinuado = 0
								OR dni LIKE $dato AND esAdmin = 0 and discontinuado = 0
								");
				return $this->db->fetchALL();
		}


		public function BuscarActividadSocio($idsocio){
				if($idsocio=="") throw new Exception('error');
				if(!is_numeric($idsocio)) throw new Exception('error');
				
				$this->db->query("SELECT act.idactividad ,act.descripcion, act.precio, ins.idinscripcion, ins.fecha_baja
						FROM inscripcion as ins
						inner join actividad as act on act.idactividad=ins.actividad_idactividad 
						WHERE ins.usuario_idpersona=$idsocio");// falta agregar los pagos
				return $this->db->fetchALL();
		}

		public function BuscarActividadSocio1($idactividad){
				if($idactividad=="") throw new Exception('error');
				if(!is_numeric($idactividad)) throw new Exception('error');
				
				$this->db->query("SELECT act.idactividad ,act.descripcion, act.precio
						FROM  actividad as act
						WHERE act.idactividad = $idactividad");// falta agregar los pagos
				return $this->db->fetchALL();
		}


		public function BuscarActividadPaga($idinscripcion){
				if($idinscripcion=="") throw new Exception('error');
				if(!is_numeric($idinscripcion)) throw new Exception('error');
				
				$this->db->query("SELECT idcuota, numero_cuota FROM `cuota` 
									WHERE `inscripcion_idinscripcion` = $idinscripcion
									ORDER BY idcuota ASC");
				return $this->db->fetchALL();
		}


		public function BuscarActividadDebe($idinscripcion){
				if($idinscripcion=="") throw new Exception('error');
				if(!is_numeric($idinscripcion)) throw new Exception('error');
				
				$this->db->query("SELECT (SELECT MAX(numero_cuota) as Coutas_Pagas 
											FROM cuota 
											WHERE inscripcion_idinscripcion = $idinscripcion) as Coutas_Pagas, 
													(select timestampdiff(MONTH,fecha_alta,NOW()) as cuota from inscripcion where idinscripcion = $idinscripcion) AS Cuotas_totales
											FROM cuota
											LIMIT 1");
				return $this->db->fetchALL();
		}


		public function BuscarActividadDebe1($idinscripcion){
				if($idinscripcion=="") throw new Exception('error');
				if(!is_numeric($idinscripcion)) throw new Exception('error');
				
				$this->db->query("SELECT (SELECT MAX(numero_cuota) as Coutas_Pagas 
											FROM cuota 
											WHERE inscripcion_idinscripcion = $idinscripcion) as Coutas_Pagas, 
													(select timestampdiff(MONTH,fecha_alta,fecha_baja) as cuota from inscripcion where idinscripcion = $idinscripcion) AS Cuotas_totales
											FROM cuota
											LIMIT 1");
				return $this->db->fetchALL();
		}
}
?>

