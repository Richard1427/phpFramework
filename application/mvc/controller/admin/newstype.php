<?php
	namespace application\mvc\controller\admin;	
	class newstype extends base{
		
		public function index(){
			

			$DataList=new \application\mvc\model\DataBase();
			$DataList->table="datatype";
			$DataList->select();
			$list =  $DataList->select()->fetchAll();
			include adview."newstype.html";
		}
	}

