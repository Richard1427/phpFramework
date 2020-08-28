<?php


namespace application\mvc\controller;


class news{
    public function index(){
        //write("this is index");
        $db = new \application\mvc\model\Database();
        $url = view."news.html";
        include $url;
    }
}