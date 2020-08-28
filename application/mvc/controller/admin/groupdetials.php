<?php
	namespace application\mvc\controller\admin;	
	class groupdetials extends base{
		
		public function index(){
			$dataid=0;
			if(isset($_GET["id"])){
				$dataid=$_GET["id"];
			}
			
			if($dataid==0){
				header("location:/admin/grouplist");
				exit();
			}

			$DataList=new \application\mvc\model\groupdetials();
						
			$Data = $DataList->CustomerSQL("select groupdetials.id,groupid,tableid,cnname,ginsert,gupdate,gselect,gdelete from groupdetials,systemtable where groupdetials.groupid=$dataid and groupdetials.tableid=systemtable.id")->fetchAll();
			


			include adview."groupdetials.html";
		}

		public function update(){
			$id=$_POST["id"];
			$type=$_POST["type"];
			$state=$_POST["state"];
			$groupid=$_POST["groupid"];
			if($groupid==0){
				echo "此权限不能修改";
				exit();
			}

			$DataList=new \application\mvc\model\DataBase();
			
			$DataList->table="groupdetials";
			$DataList->fields="$type";
			$DataList->values="$state";
			$DataList->where="id=$id";
			$DataList->update();
			
			echo "ok";
		}
	}
?>
