<?php


namespace application\mvc\controller;


class about{
    public function index(){
        //write("this is index");
        $db = new \application\mvc\model\Database();
        $url = view."about.html";
        include $url;
    }
}
