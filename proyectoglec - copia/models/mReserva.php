<?php 	

require '../views/vReserva.php';
/* Contiene la informacion de configuracion general del sistema */
class mReserva extends Model {

		public function BuscarCancha(){

				$this->db->query("SELECT idcancha, descripcion, valor FROM cancha WHERE discontinuado = 0");
				return $this->db->fetchALL();
		
		}


		public function BuscarReserva($Hdesde, $Hhasta, $fecha_reserva, $idcancha){
				$fecha = date('w', strtotime($fecha_reserva));
				date_default_timezone_set('America/Argentina/Buenos_Aires');
				if($fecha_reserva < date('Y-m-d')) throw new Exception('Error, la fecha es anterior a la actual.');
				$fecha_reserva = "'" . $fecha_reserva . "'";

				if($Hdesde=="") throw new Exception('Error, Hora de inicio esta Vacia.');
												
				if($Hhasta=="") throw new Exception('Error, Hora de fin esta Vacia.');
				
				
				if($fecha_reserva=="") throw new Exception('Error, fecha esta Vacia.');
				$anio= substr($fecha_reserva,1,4);
				$mes= substr($fecha_reserva,6,2);
				$dia= substr($fecha_reserva,9,2);
				if(!checkdate ($mes ,$dia ,$anio )) throw new Exception('Error, no corresponde a una fecha valida.');
				

				if($idcancha=="") throw new Exception('Error, cancha vacio.');
				if($idcancha<"0") throw new Exception('Error, cancha no valida.');
				if(!ctype_digit($idcancha)) throw new Exception('Error, cancha no valida.');


				$this->db->query("SELECT  r1.idreserva as id, r1.fecha_reserva, r1.hora_desde, r1.hora_hasta, r1.nombre, ca.descripcion, SUM(ing.importe) as importe, r1.cancha_idcancha
									FROM reserva as r1 
									 inner join cancha as ca on ca.idcancha = r1.cancha_idcancha
									 inner join ingreso_por_reserva as ir on ir.reserva_idreserva = r1.idreserva
									 inner join ingreso as ing on ing.idingreso = ir.ingreso_idingreso
									WHERE r1.fecha_reserva = $fecha_reserva AND r1.cancha_idcancha = $idcancha AND r1.hora_desde >= $Hdesde AND r1.hora_desde < $Hhasta
									UNION ALL
										SELECT r2.idreserva as id, r2.fecha_reserva, r2.hora_desde, r2.hora_hasta, r2.nombre, ca.descripcion, SUM(ing.importe) as importe, r2.cancha_idcancha 
										FROM reserva as r2 
										 inner join cancha as ca on ca.idcancha = r2.cancha_idcancha
										 inner join ingreso_por_reserva as ir on ir.reserva_idreserva = r2.idreserva
										 inner join ingreso as ing on ing.idingreso = ir.ingreso_idingreso
										WHERE r2.fecha_reserva = $fecha_reserva AND r2.hora_desde < $Hdesde AND r2.hora_hasta > $Hdesde AND r2.cancha_idcancha = $idcancha
									UNION ALL
										SELECT 0 as id, $fecha_reserva as fecha_reserva, hda.hora_inicio as hora_desde, hda.hora_fin as hora_hasta, act.descripcion as nombre,  ca.descripcion, 'ACT' as importe,  act.cancha_idcancha
										FROM horario_de_actividad as hda 
										 inner join actividad as act on act.idactividad =  hda.actividad_idactividad
										 inner join cancha as ca on ca.idcancha = act.cancha_idcancha
										WHERE hda.dia = $fecha and act.cancha_idcancha = $idcancha and hda.hora_inicio >= $Hdesde AND hda.hora_inicio < $Hhasta
									UNION ALL
										SELECT  0 as id, $fecha_reserva as fecha_reserva, hda.hora_inicio as hora_desde, hda.hora_fin as hora_hasta, act.descripcion as nombre,  ca.descripcion, 'ACT' as importe,  act.cancha_idcancha
										FROM horario_de_actividad as hda 
										 inner join actividad as act on act.idactividad =  hda.actividad_idactividad
										 inner join cancha as ca on ca.idcancha = act.cancha_idcancha
										WHERE hda.dia = $fecha and act.cancha_idcancha = $idcancha and hda.hora_inicio < $Hdesde AND hda.hora_fin > $Hhasta
										GROUP BY importe
										ORDER by hora_desde asc");
				return $this->db->fetchALL();
		}

		public function Reserva(){

			return 0;
		}
		
	}



?>