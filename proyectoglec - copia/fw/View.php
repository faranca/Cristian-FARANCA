<?php 
	//estamos en fe/views.php

	abstract class View{		
			public function render(){
			include '../html/'.get_class($this).'.php';
			
		}
	}