<?php 	

require '../views/vConfiguracion.php';
/* Contiene la informacion de configuracion general del sistema */
class mConfiguracion extends Model {
	public function definirAccesos($arrayAccesos){
		$this->query("SELECT * FROM accesos");
		$resultado = $this->db->fetchAll();
		// ver como resolver
		return 0;
	}
	public function depurarMaestros(){
		$this->db->query("
			TRUNCATE actividad;
			TRUNCATE cancha;
			TRUNCATE deporte;
			TRUNCATE comprobante_cfg;
			TRUNCATE horario_de_actividad;
			TRUNCATE insumo;
			DELETE FROM USUARIO WHERE idpersona != 1;
			TRUNCATE accesos;");
	}

	public function depurarMovimientos(){
		$this->db->query("
			TRUNCATE caja;
			TRUNCATE cuota;
			TRUNCATE egreso;
			TRUNCATE ingreso;
			TRUNCATE ingreso_por_reserva;
			TRUNCATE inscripcion;
			TRUNCATE insumo_por_reserva;
			TRUNCATE reserva;");
	}

	public function exportarBackup($ruta){
		return $this->db->backupDatabase("*","C:\Users\Public\Documents\backglec");
	}

	public function importarBackup($archivoImporta){
			$mysqlBaseDeDatos ='mydb';
			$mysqlNombreDeUsuario ='root';
			$mysqlClave ='';
			$mysqlHost ='localhost';
			$mysqlImportar =$archivoImporta.'.sql';

			$commando='mysql -h' .$mysqlHost .' -u' .$mysqlNombreDeUsuario .' -p' .$mysqlClave .' ' .$mysqlBaseDeDatos .' < ' .$mysqlImportar;
			exec($commando,$output=array(),$worked);
			switch($worked){
				case 0:
					return 'Se importo correctamente';
					break;
			case 1:
				echo 'Ocurrio un error al importar. Reintente';
				break;
			}
	}
}
?>