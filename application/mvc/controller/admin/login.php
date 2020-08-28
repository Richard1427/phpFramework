<?php


namespace application\mvc\controller\admin;


class login{
    public function index(){
        $state="";
        if(isset($_GET["state"])){
            $state=$_GET["state"];
        }
        include adview."login.html";
    }
}