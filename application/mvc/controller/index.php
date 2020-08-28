<?php


namespace application\mvc\controller;


class index{
    public function index(){
        //write("this is index");
        $db = new \application\mvc\model\Database();
        $url = view."index.html";
//        echo $url;
        include $url;
    }
}