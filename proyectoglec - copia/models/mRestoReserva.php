<?php 	

require '../views/vRestoReserva.php';
/* Contiene la informacion de configuracion general del sistema */
class mRestoReserva extends Model {

		public function BuscarDebedeReserva(){

				$this->db->query("SELECT  res.idreserva,  can.valor, SUM(ing.importe) as pago, 0 as insumo, res.nombre, res.dni, res.fecha_reserva, res.hora_desde, res.hora_hasta, can.descripcion
									FROM reserva as res 
									INNER JOIN ingreso_por_reserva as inxres on res.idreserva = inxres.reserva_idreserva
									INNER JOIN ingreso as ing on ing.idingreso = inxres.ingreso_idingreso
									INNER JOIN cancha as can on can.idcancha = res.cancha_idcancha
									WHERE can.valor > ing.importe and ing.idingreso NOT IN (SELECT ing.idingreso
																							FROM reserva as res 
																							INNER JOIN ingreso_por_reserva as inxres on res.idreserva = inxres.reserva_idreserva
																							INNER JOIN ingreso as ing on ing.idingreso = inxres.ingreso_idingreso
																							INNER JOIN cancha as can on can.idcancha = res.cancha_idcancha
	                                                        								INNER JOIN insumo_por_reserva as insres on insres.reserva_idreserva=res.idreserva
																							INNER JOIN insumo as ins on ins.idinsumo = insres.insumo_idinsumo
																							WHERE can.valor >= ing.importe)
                                   GROUP by res.idreserva
									UNION ALL
									SELECT res.idreserva, can.valor, SUM(ing.importe) as pago, (ins.precio * insres.cantidad) as insumo,  res.nombre, res.dni, res.fecha_reserva, res.hora_desde, res.hora_hasta, can.descripcion
									FROM reserva as res 
									INNER JOIN ingreso_por_reserva as inxres on res.idreserva = inxres.reserva_idreserva
									INNER JOIN ingreso as ing on ing.idingreso = inxres.ingreso_idingreso
									INNER JOIN cancha as can on can.idcancha = res.cancha_idcancha
									INNER JOIN insumo_por_reserva as insres on insres.reserva_idreserva=res.idreserva
									INNER JOIN insumo as ins on ins.idinsumo = insres.insumo_idinsumo
									WHERE can.valor + (ins.precio * insres.cantidad) >= ing.importe 
                                    GROUP by res.idreserva
									ORDER BY fecha_reserva ASC, hora_desde ASC");
				return $this->db->fetchALL();
		}




		
		
	}



?>