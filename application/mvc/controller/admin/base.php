<?php


namespace application\mvc\controller\admin;


class base{
    public function __construct(){
//        session_start();
//        if(!isset($_SESSION["admin"])){
//            header("location:/admin/login");
//        }else{
//            if($_SESSION["admin"]=="" || $_SESSION["admin"]==null){
//                header("location:/admin/login");
//            }
//        }
        $this->vardata("title","后台管理系统");
        $this->vardata("ctitle","主面板");
    }
    public $varlist;

    #将控制器的变量值存储到当前类中
    #变量名称
    #变量的值
    public function vardata($name,$value){
        $this->varlist[$name]=$value;
    }
}