<?php
	namespace application\mvc\controller;	
	class index extends baseclass{
		public function index(){
			$title=$this->title;

			$assign["a1"]="123";
			$assign["a2"]="456";

			extract($assign);

			include views."index.html";
		}
	}
?>
