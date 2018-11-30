<?php 	

require '../views/vCobro.php';
/* Contiene la informacion de configuracion general del sistema */
class mCobro extends Model {

		/* Obtiene la ultima caja*/
		public function getUltimaCaja(){
			$this->db->query("SELECT MAX(idcaja) as idcaja from caja");
			$numeroCaja = $this->db->fetch();	
			return $numeroCaja["idcaja"];
			
		}

		public function getUltimoNumero($idcpb){
			$this->db->query("SELECT ultimo_numero from comprobante_cfg where idcomprobantecfg = $idcpb");
			$numero = $this->db->fetch();	
			return $numero["ultimo_numero"];
			
		}

		/* Obtiene el ultimo Comprobante*/
		public function getUltimoComprobante($Tipo){
			$Tipo= "'" . $Tipo . "'";
			$this->db->query("SELECT MAX(idcomprobantecfg) as idcomprobante from comprobante_cfg WHERE tipo LIKE $Tipo");
			$idcomprobante = $this->db->fetch();	
			return $idcomprobante["idcomprobante"];
			
		}

		/* Obtiene el ultimo Ingreso*/
		public function getUltimoIngreso(){
			$this->db->query("SELECT MAX(idingreso) as idingreso from ingreso");
			$idingreso = $this->db->fetch();	
			return $idingreso["idingreso"];
			
		}


		public function getUltimoIdcomp(){
			$idCaja = $this->getUltimaCaja();

			$this->db->query("SELECT comprobante_cfg_idcomprobantecfg  FROM ingreso WHERE caja_idcaja = $idCaja ORDER BY idingreso DESC LIMIT 1");
			$idcmp = $this->db->fetch();	
			return $idcmp["comprobante_cfg_idcomprobantecfg"];
			
		}

		/* Obtiene la ultima Reserva*/
		public function getUltimaReserva(){
			$this->db->query("SELECT MAX(idreserva) as idreserva from reserva LIMIT 1");
			$numeroReserva = $this->db->fetch();
			return $numeroReserva["idreserva"];
		}

		/* Obtiene la ultima Inscripcion */
		public function getUltimaInscripcion(){
			$this->db->query("SELECT MAX(idinscripcion) as idInscripcion from inscripcion LIMIT 1");
			$numeroInscripcion = $this->db->fetch();
			return $numeroInscripcion["idInscripcion"];
		}

		public function GetPrecioActividad($id){
			$this->db->query("SELECT precio as pre FROM actividad WHERE idactividad = $id LIMIT 1");
			$precio = $this->db->fetch();
			return $precio["pre"];
		}

		/* Revisa si la caja esta abierta o cerrada */
		public function BuscarCajaAbierta(){
			$ultimaCaja = $this->getUltimaCaja();
			$this->db->query("SELECT max(idcaja) as caja  FROM `caja` WHERE `idcaja` = $ultimaCaja AND `fecha_cierre` IS NOT NULL");
			return $this->db->fetch();
				
		}

		/* Actualiza los datos del ultimo comprobante del tipo seleccionado*/
		public function UpdateComprobante($Tipo){
			$UltimoComprobante = $this->getUltimoComprobante($Tipo);
			$this->db->query("  UPDATE comprobante_cfg SET ultimo_numero = ultimo_numero+1
							WHERE idcomprobantecfg = $UltimoComprobante");
			return $UltimoComprobante;
				
			
		}


		public function getNumCompr($idCompr){
			$this->db->query("SELECT ultimo_numero from comprobante_cfg where idcomprobantecfg = $idCompr");
			$numero = $this->db->fetch();
			$numero++;	
			return $numero["ultimo_numero"];
			
		}

		public function getNombreActividad($id){
			$this->db->query("SELECT descripcion FROM actividad WHERE idactividad = $id LIMIT 1");
			$descripcion = $this->db->fetch();
			return $descripcion["descripcion"];
			
		}

		/* Crea un Ingreso*/
		public function CargarIngreso($Tipo, $Precio, $Descripcion){
			$idCaja = $this->getUltimaCaja();
			$idCompr = $this->UpdateComprobante($Tipo);
			$NumCompr = $this->getNumCompr($idCompr);

			$Descripcion = "'" . $Descripcion . "'";
			$this->db->query("INSERT INTO ingreso (idingreso, fecha, importe, caja_idcaja, numero, comprobante_cfg_idcomprobantecfg, hora_ingreso, descripcion_ingreso )
								VALUES (NULL, NOW(), $Precio, $idCaja, $NumCompr, $idCompr, TIME(NOW()), $Descripcion)");
			return $idCompr;
			
		}

		/* Crea un Ingreso Mismo Comprobante*/
		public function CargarIngresoMC($Tipo, $Precio, $Descripcion, $Cantidad, $MaxCuotaPaga){
			$idCaja = $this->getUltimaCaja();
			$idCompr = $this->UpdateComprobante($Tipo);
			$NumCompr = $this->getNumCompr($idCompr);
			$Count = 1;
			
			while($Count <= $Cantidad){
				$MCP = $MaxCuotaPaga + $Count;
				$Desc = "'" . $Descripcion . " " . $MCP . "'";
				$this->db->query("INSERT INTO ingreso (idingreso, fecha, importe, caja_idcaja, numero, comprobante_cfg_idcomprobantecfg, hora_ingreso, descripcion_ingreso )
								VALUES (NULL, NOW(), $Precio, $idCaja, $NumCompr, $idCompr, TIME(NOW()), $Desc)");
				$Count++;
			}
			return 0;
			
		}


		/* Registra Pago de Cuota*/
		public function CobrarCuota($Tipo, $Precio, $Descripcion, $Cantidad, $idInscripcion, $NumCouta){
			if($Tipo == "") throw new Exception('Error, Tipo de Factura no valido.');
			if($Tipo!= 'A' and $Tipo!= 'B' and $Tipo!= 'C') throw new Exception('Error, Tipo de Factura no valido.');

			if($Precio == "") throw new Exception('Error, Monto esta vacio.');
			if($Precio < 0) throw new Exception('Error, monto negativo o cero.');
			if(!is_numeric($Precio)) throw new Exception('Error, monto no valido.');

			if($Descripcion == "") throw new Exception('Error, Descripcion esta vacio.');

			if($Cantidad == "") throw new Exception('Error, Cantidad esta vacia.');
			if($Cantidad < 0) throw new Exception('Error, Cantidad negativo o cero.');
			if(!is_numeric($Cantidad)) throw new Exception('Error, Cantidad no valida.');

			if($idInscripcion == "") throw new Exception('Error.');
			if($idInscripcion < 0) throw new Exception('Error.');
			if(!is_numeric($idInscripcion)) throw new Exception('Error.');

			if($NumCouta == "") throw new Exception('Error.');
			if($NumCouta < 0) throw new Exception('Error.');
			if(!is_numeric($NumCouta)) throw new Exception('Error.');


			$idCompr = $this->CargarIngresoMC($Tipo, $Precio, $Descripcion, $Cantidad, $NumCouta);

			$idIngreso = $this->getUltimoIngreso();
			$idIngreso = $idIngreso - $Cantidad;
			$Count = 1;
			$NC = $NumCouta;
			while($Count <= $Cantidad){
				$NC++;
				$idIngreso++;
				$Count++;
				$this->db->query("  INSERT INTO cuota (idcuota, numero_cuota, ingreso_idingreso, inscripcion_idinscripcion)
								VALUES(NULL, $NC, $idIngreso, $idInscripcion)");
			}
			return 0;
			
			
		}

		public function CobrarInscripcion($Tipo, $idSocio, $idActividad, $Descripcion){
			if($Tipo == "") throw new Exception('Error, Tipo de Factura no valido.');
			if($Tipo!= 'A' and $Tipo!= 'B' and $Tipo!= 'C') throw new Exception('Error, Tipo de Factura no valido.');

			if($Descripcion == "") throw new Exception('Error, Descripcion esta vacio.');

			if($idSocio == "") throw new Exception('Error.');
			if($idSocio < 0) throw new Exception('Error.');
			if(!is_numeric($idSocio)) throw new Exception('Error.');

			if($idActividad == "") throw new Exception('Error.');
			if($idActividad < 0) throw new Exception('Error.');
			if(!is_numeric($idActividad)) throw new Exception('Error.');

			$Precio = $this->GetPrecioActividad($idActividad);
			$Descripcion = $Descripcion . $this->getNombreActividad($idActividad);
			$idCompr = $this->CargarIngreso($Tipo, $Precio, $Descripcion);
			
			$this->db->query("INSERT INTO `inscripcion` (`idinscripcion`, `fecha_alta`, `fecha_baja`, `usuario_idpersona`, `actividad_idactividad`) 
								VALUES (NULL, NOW(), NULL, $idSocio, $idActividad)");

			$idIngreso = $this->getUltimoIngreso();
			$idInscripcion = $this->getUltimaInscripcion();
			$this->db->query("INSERT INTO cuota (idcuota, numero_cuota, ingreso_idingreso, inscripcion_idinscripcion)
								VALUES(NULL, '1', $idIngreso, $idInscripcion)");
			return $idCompr;
			
			
		}

		public function CobrarReserva($Tipo, $Senia, $Descripcion, $nombre, $dni, $idcancha, $fecha, $hora_desde, $hora_hasta, $telefono, $observacion){
			if($Tipo == "") throw new Exception('Error, Tipo de Factura no valido.');
			if($Tipo!= 'A' and $Tipo!= 'B' and $Tipo!= 'C') throw new Exception('Error, Tipo de Factura no valido.');

			if($Senia == "") throw new Exception('Error, Monto esta vacio.');
			if($Senia < 0) throw new Exception('Error, monto negativo o cero.');
			if(!is_numeric($Senia)) throw new Exception('Error, monto no valido.');

			if($Descripcion == "") throw new Exception('Error, Descripcion esta vacio.');

			if($nombre == "") throw new Exception('Error, Nombre esta vacio.');

			if($dni == "") throw new Exception('Error, DNI esta vacio.');

			if($telefono == "") throw new Exception('Error, Telefono esta vacio.');

			if($observacion == "") throw new Exception('Error, Observacion esta vacio.');

			if($hora_desde == "") throw new Exception('Error, Hora esta vacia.');

			if($hora_hasta == "") throw new Exception('Error, Hora esta vacia.');

			if($idcancha == "") throw new Exception('Error.');
			if($idcancha < 0) throw new Exception('Error.');
			if(!is_numeric($idcancha)) throw new Exception('Error.');

			if($fecha=="") throw new Exception('Error, fecha esta Vacia.');
				$anio= substr($fecha,1,4);
				$mes= substr($fecha,6,2);
				$dia= substr($fecha,9,2);
			if(!checkdate ($mes ,$dia ,$anio )) throw new Exception('Error, no corresponde a una fecha valida.');

			$idCompr = $this->CargarIngreso($Tipo, $Senia, $Descripcion);

			$idIngreso = $this->getUltimoIngreso();
			
							
			$this->db->query("INSERT INTO reserva (idreserva, nombre, dni, telefono, observacion, cancha_idcancha, fecha_reserva, hora_desde, hora_hasta) 
				VALUES (NULL, $nombre, $dni, $telefono, $observacion, $idcancha, $fecha, $hora_desde, $hora_hasta)");

			$idReserva = $this->getUltimaReserva();

			$this->db->query("INSERT INTO `ingreso_por_reserva` (`ingreso_idingreso`, `reserva_idreserva`) VALUES ($idIngreso, $idReserva)");
			
			return $idReserva;
		}

		public function CobrarResto($Tipo, $Importe, $Descripcion, $idReserva){
			if($Tipo == "") throw new Exception('Error, Tipo de Factura no valido.');
			if($Tipo!= 'A' and $Tipo!= 'B' and $Tipo!= 'C') throw new Exception('Error, Tipo de Factura no valido.');

			if($Importe == "") throw new Exception('Error, Monto esta vacio.');
			if($Importe < 0) throw new Exception('Error, monto negativo o cero.');
			if(!is_numeric($Importe)) throw new Exception('Error, monto no valido.');

			if($Descripcion == "") throw new Exception('Error, Descripcion esta vacio.');
			
			if($idReserva == "") throw new Exception('Error.');
			if($idReserva < 0) throw new Exception('Error.');
			if(!is_numeric($idReserva)) throw new Exception('Error.');

			$idCompr = $this->CargarIngreso($Tipo, $Importe, $Descripcion);
			$idIngreso = $this->getUltimoIngreso();

			$this->db->query("INSERT INTO ingreso_por_reserva (ingreso_idingreso, reserva_idreserva) VALUES ($idIngreso, $idReserva)");
			return 0;	
		}


		public function getCPB(){
			$idcpb = $this->getUltimoIdcomp();
				$this->db->query("SELECT idcomprobantecfg, tipo, prefijo, numero_inicial, ultimo_numero, (SELECT MAX(idcaja) as idcaja from caja) as idcaja FROM comprobante_cfg
								WHERE idcomprobantecfg = $idcpb");
			return $this->db->fetch();	
			
		}


		public function getPagos(){
			$idCaja = $this->getUltimaCaja();
			$idcpb = $this->getUltimoIdcomp();
			$numero = $this->getUltimoNumero($idcpb);
				$this->db->query("SELECT descripcion_ingreso as descripcion, importe FROM ingreso 
									WHERE caja_idcaja = $idCaja AND numero = $numero AND comprobante_cfg_idcomprobantecfg = $idcpb ORDER BY idingreso ASC");
				return $this->db->fetchALL();
		}
		



		public function CargarInsumoUltimaReserva($idInsumo, $Cantidad){
			if($idInsumo == "") throw new Exception('Error.');
			if($idInsumo < 0) throw new Exception('Error.');
			if(!is_numeric($idInsumo)) throw new Exception('Error.');

			if($Cantidad == "") throw new Exception('Error.');
			if($Cantidad < 0) throw new Exception('Error.');
			if(!is_numeric($Cantidad)) throw new Exception('Error.');

			$idReserva = $this->getUltimaReserva();
			
				$this->db->query("INSERT INTO insumo_por_reserva (insumo_idinsumo, reserva_idreserva, cantidad) VALUES ($idInsumo, $idReserva, $Cantidad)");
			return 0;
		
		}

		public function InsumoDisponible($idCancha, $fecha, $hi, $hf){
			if($idCancha == "") throw new Exception('Error.');
			if($idCancha < 0) throw new Exception('Error.');
			if(!is_numeric($idCancha)) throw new Exception('Error.');

			if($hi == "") throw new Exception('Error. Hora esta vacia');

			if($hf == "") throw new Exception('Error. Hora esta vacia');

			if($fecha=="") throw new Exception('Error, fecha esta Vacia.');
				$anio= substr($fecha,1,4);
				$mes= substr($fecha,6,2);
				$dia= substr($fecha,9,2);
			if(!checkdate ($mes ,$dia ,$anio )) throw new Exception('Error, no corresponde a una fecha valida.');

			$this->db->query("SELECT ins.idinsumo, ins.descripcion, ins.precio, (ins.stock - inre.cantidad) as cantidad, 'Reservada' as estado, res.fecha_reserva, res.hora_desde, res.hora_hasta 
							  FROM insumo as ins
								INNER JOIN insumo_por_reserva AS inre on inre.insumo_idinsumo=ins.idinsumo
								INNER JOIN reserva as res on res.idreserva=inre.reserva_idreserva
							    INNER join cancha as can on can.deporte_iddeporte=ins.deporte_iddeporte and can.idcancha = $idCancha
							    WHERE res.fecha_reserva = $fecha and res.hora_desde = $hi and res.hora_hasta = $hf
							    
							   UNION ALL
							   SELECT in2.idinsumo, in2.descripcion, in2.precio, in2.stock as cantidad, 'Stock' as estado, '-' as fecha_reserva, '-' as hora_desde, '-' as hora_hasta FROM insumo as in2
								
								INNER join cancha as can on can.deporte_iddeporte=in2.deporte_iddeporte and can.idcancha = $idCancha
                                WHERE in2.idinsumo NOT IN(SELECT ins.idinsumo FROM insumo as ins
															INNER JOIN insumo_por_reserva AS inre on inre.insumo_idinsumo=ins.idinsumo
															INNER JOIN reserva as res on res.idreserva=inre.reserva_idreserva
														    INNER join cancha as can on can.deporte_iddeporte=ins.deporte_iddeporte and can.idcancha = $idCancha
														    WHERE res.fecha_reserva = $fecha and res.hora_desde = $hi and res.hora_hasta = $hf)
                                
							   ORDER by idinsumo ASC");
						$insumodisp = $this->db->fetchALL();
						
						return $insumodisp;
		}
		
	}


?>