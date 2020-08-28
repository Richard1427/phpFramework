<?php
	namespace application\mvc\controller\admin;	
	class newslist extends base{
		
		public function index(){
			

			$DataList=new \application\mvc\model\DataBase();
			$DataList->table="datainfos";
			$DataList->select();
			$list =  $DataList->select()->fetchAll();
			include adview."newslist.html";
		}
	}
?>
