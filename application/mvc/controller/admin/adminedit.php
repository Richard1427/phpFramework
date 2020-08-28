<?php
	namespace application\mvc\controller\admin;	
	class adminedit extends base{
		
		public function index(){
			
			$dataid=0;
			if(isset($_GET["id"])){
				$dataid=$_GET["id"];
			}

			$DataList=new \application\mvc\model\DataBase();
			
			$DataList->table="admin";
			$DataList->where="id=$dataid";
			$Data = $DataList->select()->fetchAll();
			
			if($dataid==0){
				$Data=array(["id"=>"0","aname"=>"","state"=>"1","groupid"=>""]);
				
			}

			$DataList->table="grouplist";
			$DataList->where="state=1";
			$GroupList = $DataList->select()->fetchAll();		

			include adview."adminedit.html";
		}

		public function submit(){
			$id=$_POST["id"];
			$aname=$_POST["aname"];
			$apwd=md5($_POST["apwd"]);
			$groupid=$_POST["groupid"];
			$state=$_POST["state"];

			if($groupid=="" || $groupid=="0"){
				echo "请选择权限组";
				exit();
			}

			$DataList=new \application\mvc\model\DataBase();
			$admin = $DataList->query("select * from admin where aname='$aname'")->fetchAll();
			if(count($admin)>0){
				echo "昵称已存在";
				exit();
			}


			$DataList->table="admin";
			$DataList->fields="aname,apwd,groupid,state";
			$DataList->values="'$aname','$apwd',$groupid,$state";

			if($id!="0"){
				$DataList->where="id=$id";
				$DataList->update();
			}else{
				$DataList->insert();
			}
			echo "ok";
		}

		public function del(){
			$id=$_POST["id"];
			$DataList=new \application\mvc\model\DataBase();
			$DataList->table="admin";
			$DataList->where="groupid=$id";
			$adminlist=$DataList->select()->fetchAll();
			$count = count($adminlist);
			if($count==0){
				$DataList->table="admin";
				$DataList->where="id=$id";
				$DataList->del();
				echo "ok";
			}

		}
	}
?>
