<?php 
	//estamos en fw/Database.php

	class Database{
		private static $instance;
		private $cn;
		private $res;
		private $backupDirectory = 'C:/';
		private $database = 'mydb';

		public static function getInstance(){
			if(!self::$instance) self::$instance = new Database;
			return self::$instance;/*los doble :: es porq es una variable de clase*/
			}

		private function __construct(){}
			/*lo 1ro q se hace es hacer el constructor privado*/

			

		public function query($q){
			$this->connect();
			$this->res=mysqli_query($this->cn,$q);

			if(mysqli_error($this->cn)!="") die("ERROR SQL: " . mysqli_error($this->cn));
		}

		public function fetch(){
			return mysqli_fetch_assoc($this->res);
		}

		public function fetchAll(){
			$aux = array();
			while($fila = $this->fetch()){
				$aux[] = $fila;
			}
			return $aux;
		}	

		public function numRows(){
			return mysqli_num_rows($this->res);
		}
		private function connect(){
			if(!$this->cn) $this->cn=mysqli_connect("localhost","root","","mydb");
		}

		public function escape($str){
			$this->connect();
			return mysqli_escape_string($this->cn,$str);
		}

	/* Funcion que arma la estructura de la base de datos */
	public function backupDatabase($tables = '*',$backupDirectory = ''){
		$this->connect();
		if($tables == '*'){
			$tables =	array();
			$result	=	mysqli_query($this->cn,"SHOW TABLES");
			while($row = mysqli_fetch_row($result)){
				$tables[]	=	$row[0];
			}
		}else{
			$tables	=	is_array($tables) ? $tables : explode(',',$tables);
		}
		$sql	=	'SET FOREIGN_KEY_CHECKS = 0;'."\n".'CREATE DATABASE IF NOT EXISTS `'.$this->database."`;\n";
		$sql	.=	'USE `'.$this->database.'`;';
		
		foreach($tables as $table){
			/*echo 'Logging Table : `'.$table.'` : ';*/
			$tableDetails	=	mysqli_query($this->cn, "SELECT * FROM ".$table);
			$totalCols	=	mysqli_num_fields($tableDetails);
			$sql		.=	"\n\nDROP TABLE IF EXISTS `".$table."`;\n";
			$result1	=	mysqli_fetch_row(mysqli_query($this->cn,'SHOW CREATE TABLE '.$table));
			$sql		.=	$result1[1].";\n\n";
			while($row = mysqli_fetch_row($tableDetails)){
				
				$sql	.=	'INSERT INTO `'.$table.'` VALUES(';
				
				for($j=0; $j<$totalCols; $j++){
					$row[$j]	=	preg_replace("/\n/","\\n",addslashes($row[$j]));
					if (isset($row[$j])){
						$sql .= '"'.$row[$j].'"' ;
					}else{
						$sql.= '""';
					}
					if ($j < ($totalCols-1)){
						$sql .= ', ';
					}
				}
				$sql	.=	"); \n";
			}
			/*echo 'Completed <br/>';*/
		}

		$sql .= 'SET FOREIGN_KEY_CHECKS = 1;';
		$backupDirectory = ($backupDirectory == '') ? $this->backupDirectory : $backupDirectory;
		$respuesta;
		if($this->logDatabase($sql,$backupDirectory)){
			/*echo '<h4>Exported Database <span style="color:#7D0097">`'.$this->database.'`</span>Successfully to folder - <span style="color:#1CAD7A"> `'.$backupDirectory.'`</span><h4>';exit;*/
			$respuesta = "Se creo el backup de la base de datos ".$this->database." en:".$backupDirectory."/".'backup'.$this->database.date('Y-m-d_H-i-s');
		}else{
			$respuesta = "Error al exportar la base de datos ".$this->database;
		}
		return $respuesta;
	}

	/* Funcion que guarda la base generada en el disco local */
	private function logDatabase($sql,$backupDirectory = ''){
		if(!$sql){
			return false;
		}
		
		if(!file_exists($backupDirectory)){
			if(mkdir($backupDirectory)){
				$filename	=	'backup'.$this->database.date('Y-m-d_H-i-s');
				$fileHandler	=	fopen($backupDirectory.'/'.$filename.'.sql','w+');
				fwrite($fileHandler,$sql);
				fclose($fileHandler);
				return true;
			}
		}else{
			$filename	=	'log_'.$this->database.date('Y-m-d_H-i-s');
			$fileHandler	=	fopen($backupDirectory.'/'.$filename.'.sql','w+');
			fwrite($fileHandler,$sql);
			fclose($fileHandler);
			return true;
		}	
		return false;
	}
									
	}

?>