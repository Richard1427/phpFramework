<?php
	namespace application\mvc\model;
	class DataBase extends \PDO{
		public $server="mysql:dbname=db20200514;host=127.0.0.1";
		public $root="root";
		public $pwd="123456";
		public function __construct(){
			try{
				parent::__construct($this->server,$this->root,$this->pwd);
			}catch(\PDOException $e){
				Write($e->getMessage());
			}
		}
		public function checktable(){
			if($this->table==""){
				Write("<fieldset><legend>出错啦</legend>");
				Write("类名:".__class__);
				Write("函数名:".__function__);
				Write("第 ".__line__." 行");
				Write("表名不能为空");
				Write("</fieldset>");
				return false;
			}
		}

		public $table="";  #表名
		public $fields="*"; #列名
		public $where="";  #条件,不需要加 where关键词
		public $orderby=""; #排序 不需要加 order by
		public $startcount=0;
		public $datasize=0;
		public $limit="";
		public function select(){
			if(!$this->checktable()){
				return;
			}
			if($this->where!=""){
				$this->where=" where ".$this->where;
			}
			if($this->orderby!=""){
				$this->orderby=" order by ".$this->orderby;
			}

			if($this->startcount>0){
				$$this->limit=" limit $this-startcount";
				if($this->datasize>0){
					$$this->limit.=",".$this->datasize;
				}
			}

			$sql="select $this->fields from $this->table $this->where $this->orderby $limit";
			return $this->query($sql);
		}

		public $values="";
		public function insert(){
			if(!$this->checktable()){
				return;
			}
			if($this->fields==""){
				return;
			}
			if($this->values==""){
				return;
			}

			$sql="insert into $this->table($this->fields) values($this->values)";
			return $this->query($sql);
		}

		public function update(){
			if(!$this->checktable()){
				return;
			}
			if($this->fields==""){
				return;
			}
			if($this->values==""){
				return;
			}

			if($this->where!=""){
				$this->where=" where ".$this->where;
			}

			$fieldarray = explode(",",$this->fields);
			$valuearray = explode(",",$this->values);
			
			if(count($fieldarray)!=count($valuearray)){
				Write("字段数量和值的数量不一致");
				return;
			}
			$fv="";
			for($i=0;$i<count($fieldarray);$i++){
				$fv.=$fieldarray[$i]."=".$valuearray[$i].",";
			}
			$fv=trim($fv,",");

			$sql="update $this->table set $fv $this->where";			
			return $this->query($sql);
		}

		public function del(){
			if(!$this->checktable()){
				return;
			}
			if($this->where!=""){
				$this->where=" where ".$this->where;
			}
			$sql="delete from $this->table $this->where";
			return $this->query($sql);
		}
	}
?>