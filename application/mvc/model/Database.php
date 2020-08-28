<?php

namespace application\mvc\model;

class Database extends \PDO{

    public function __construct(){
        $dsn = "mysql:dbname=webdata;host=localhost";
        $username = "root";
        $password = "root";
        try {
            parent::__construct($dsn, $username, $password);
        }catch (\PDOException $e){
            write($e->getMessage());
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
        return true;
    }//检查表名是否为空

    public $table="";  #表名
    public $fields="*"; #列名
    public $where="";  #条件,不需要加 where关键词
    public $orderBy=""; #排序 不需要加 order by
    public $startCount=0;
    public $dataSize=0;
    public $limit="";
    public function select(){
        if(!$this->checktable()){
            return false;
        }
        $_where="";
        if($this->where!=""){
            $_where=" where ".$this->where;
        }
        if($this->orderBy!=""){
            $this->orderBy=" order by ".$this->orderBy;
        }

        if($this->startCount>0){
            $$this->limit=" limit $this-startCount";
            if($this->dataSize>0){
                $$this->limit.=",".$this->dataSize;
            }
        }

        $sql="select $this->fields from $this->table $_where $this->orderBy $this->limit";
//       echo $sql;exit();
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
//        write($sql);exit();
        $this->exec($sql);
        return $this->lastInsertId();
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

        $_where="";
        if($this->where!=""){
            $_where=" where ".$this->where;
        }

        $fieldArray = explode(",",$this->fields);
        $valueArray = explode(",",$this->values);

        if(count($fieldArray)!=count($valueArray)){
            Write("字段数量和值的数量不一致");
            return;
        }
        $fv="";
        for($i=0;$i<count($fieldArray);$i++){
            $fv.=$fieldArray[$i]."=".$valueArray[$i].",";
        }
        $fv=trim($fv,",");

        $sql="update $this->table set $fv $_where";

        return $this->query($sql);
    }

    public function del(){
        if(!$this->checktable()){
            return;
        }
        $_where="";
        if($this->where!=""){
            $_where=" where ".$this->where;
        }
        $sql="delete from $this->table $_where";
        return $this->query($sql);
    }
}