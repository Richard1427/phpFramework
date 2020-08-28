<?php
	namespace application\mvc\controller\admin;	
	class newsedit extends base{
		
		public function index(){
			$dataid=0;
			if(isset($_GET["id"])){
				$dataid=$_GET["id"];
			}

			$DataList=new \application\mvc\model\DataBase();
			
			$DataList->table="grouplist";
			$DataList->where="id=$dataid";
			$Data = $DataList->select()->fetchAll();
			
			if($dataid==0){
				$Data=array(["id"=>"0","gname"=>"","state"=>"1"]);
				
			}


			include adview."groupedit.html";
		}

		public function del(){
			$id=$_POST["id"];
			$DataList=new \application\mvc\model\DataBase();
			
			#检验权限有没有在使用
			$DataList->table="admin";
			$DataList->where="groupid=$id";
			$adminlist=$DataList->select()->fetchAll();
			$count=count($adminlist);
			if($count==0){
				$DataList->table="grouplist";
				$DataList->where="id=$id";
				$DataList->del();
				
				$DataList->table="groupdetials";
				$DataList->where="groupid=$id";
				$DataList->del();

				echo "ok";
			}else{
				echo "该权限组使用中";
			}
		}

		public function submit(){
			$id=$_POST["id"];
			$gname=$_POST["gname"];
			$state=$_POST["state"];

			$DataList=new \application\mvc\model\DataBase();
			
			$DataList->table="grouplist";
			$DataList->fields="gname,state";
			$DataList->values="'$gname',$state";

			if($id!="0"){
				$DataList->where="id=$id";
				$DataList->update();
			}else{
				$NewID = $DataList->insert();
				if($NewID>0){
					$sql="insert into groupdetials(groupid,tableid) select $NewID,id from systemtable";
					$DataList->query($sql);
				}
			}
			echo "ok";
		}
	}
?>
