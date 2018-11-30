<?php
//estamos en fw/Model

	abstract class Model{
		protected $db;

		public function __construct(){
			$this->db = Database::getInstance();
			}
		}
?>