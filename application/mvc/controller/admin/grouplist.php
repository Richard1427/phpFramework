<?php
	namespace application\mvc\controller\admin;	
	class grouplist extends base{
		
		public function index(){
			

			$DataList=new \application\mvc\model\DataBase();
			$DataList->table="grouplist";
			$DataList->select();
			$list =  $DataList->select()->fetchAll();
			$this->vardata("crtitle","权限组");
			include adview."grouplist.html";
		}
	}
?>
