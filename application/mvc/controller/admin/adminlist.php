<?php
	namespace application\mvc\controller\admin;	
	use application\mvc\model\Database;

class adminlist extends base{
		
		public function index(){
			$DataList=new \application\mvc\model\DataBase();
			$DataList->table="admin";
			$model = $DataList->select()->fetchAll();
			$this->vardata("list",$DataList->select());
//			var_dump($model);
			$url = adview."adminlist.html";
			include $url;
		}
	}
?>
