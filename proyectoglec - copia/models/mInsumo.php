<?php 	

require '../views/vInsumo.php';
/* Contiene la informacion de configuracion general del sistema */
class mInsumo extends Model {

	public function Insumo(){
				
				
				return 0;
		}


	public function BuscarDeporte(){

				$this->db->query("SELECT iddeporte, descripcion FROM deporte WHERE discontinuado = 0");
				return $this->db->fetchALL();
		
		}



	public function BuscarReserva($Hdesde, $Hhasta, $fecha_reserva, $iddeporte){

				if($Hdesde=="") throw new Exception('error');
								
				if($Hhasta=="") throw new Exception('error');

				if($fecha_reserva=="") throw new Exception('error');
				$anio= substr($fecha_reserva,1,4);
				$mes= substr($fecha_reserva,6,2);
				$dia= substr($fecha_reserva,9,2);	
				if(!checkdate ($mes ,$dia ,$anio )) throw new Exception('error');

				if($iddeporte=="") throw new Exception('error');
				if($iddeporte<"0") throw new Exception('error');
				if(!ctype_digit($iddeporte)) throw new Exception('error');


				$this->db->query("SELECT  r1.idreserva, r1.nombre
									FROM reserva as r1 
									 inner join cancha as ca on ca.idcancha = r1.cancha_idcancha
									WHERE r1.fecha_reserva = $fecha_reserva AND ca.deporte_iddeporte = 1 AND r1.hora_desde >= $Hdesde AND r1.hora_desde < $Hhasta
								   UNION ALL
									SELECT r2.idreserva, r2.nombre 
									 FROM reserva as r2 
					 				  inner join cancha as ca on ca.idcancha = r2.cancha_idcancha
									 WHERE r2.fecha_reserva = $fecha_reserva AND r2.hora_desde < $Hdesde AND r2.hora_hasta > $Hdesde AND ca.deporte_iddeporte = 1");
					
				return $this->db->fetchALL();
				
		}

				public function InsumoDisponible($idDeporte, $fecha, $hi, $hf, $dato){
			$this->db->query("SELECT ins.idinsumo as idinsumo, ins.descripcion as nombre, ins.precio, ins.stock - SUM(inre.cantidad) as cantidad, 'Reservada' as estado, res.fecha_reserva, res.hora_desde, res.hora_hasta 
							  FROM insumo as ins
								INNER JOIN insumo_por_reserva AS inre on inre.insumo_idinsumo=ins.idinsumo
								INNER JOIN reserva as res on res.idreserva=inre.reserva_idreserva
							   
							    WHERE res.fecha_reserva = $fecha AND res.hora_desde = $hi AND res.hora_hasta = $hf and ins.deporte_iddeporte = $idDeporte AND ins.descripcion LIKE '%".$dato."%'
							    GROUP BY idinsumo
							   UNION ALL
								SELECT in2.idinsumo as idinsumo, in2.descripcion as nombre, in2.precio, in2.stock as cantidad, 'Stock' as estado, '-' as fecha_reserva, '-' as hora_desde, '-' as hora_hasta 
								FROM insumo as in2
								     WHERE in2.deporte_iddeporte = $idDeporte AND in2.descripcion LIKE '%".$dato."%' AND in2.idinsumo NOT IN(SELECT ins.idinsumo FROM insumo as ins
															INNER JOIN insumo_por_reserva AS inre on inre.insumo_idinsumo=ins.idinsumo
															INNER JOIN reserva as res on res.idreserva=inre.reserva_idreserva
														    
														    WHERE ins.deporte_iddeporte = $idDeporte AND res.fecha_reserva = $fecha AND res.hora_desde = $hi AND res.hora_hasta = $hf)
                               
							   ORDER by idinsumo ASC");
						$insumodisp = $this->db->fetchALL();
						
						return $insumodisp;
		}

		public function CarcarInsumoaReserva($idInsumo, $Cantidad, $idReserva){

				if($idInsumo=="") throw new Exception('error');
				if($idInsumo<"0") throw new Exception('error');
				if(!ctype_digit($idInsumo)) throw new Exception('error');

				if($Cantidad=="") throw new Exception('error');
				if($Cantidad<"0") throw new Exception('error');
				if(!ctype_digit($Cantidad)) throw new Exception('error');

				if($idReserva=="") throw new Exception('error');
				if($idReserva<"0") throw new Exception('error');
				if(!ctype_digit($idReserva)) throw new Exception('error');

				$this->db->query("INSERT INTO insumo_por_reserva (insumo_idinsumo, reserva_idreserva, cantidad) VALUES ($idInsumo, $idReserva, $Cantidad)");
			return 0;
		
		}

	}



?>