<?php
	namespace application\mvc\model;
	class groupdetials extends DataBase{		
		public function __construct(){
			parent::__construct();
		}
		public function CustomerSQL($sql){
			return $this->query($sql);
		}
	}
?>